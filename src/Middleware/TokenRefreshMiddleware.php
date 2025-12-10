<?php
/**
 * TokenRefreshMiddleware
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK\Middleware
 */

declare(strict_types=1);

namespace SergeR\MagintB2BPlatformSDK\Middleware;

use Psr\Http\Message\RequestInterface;
use SergeR\MagintB2BPlatformSDK\TokenStorage\TokenStorageInterface;

/**
 * Middleware for automatic token refresh
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK\Middleware
 */
class TokenRefreshMiddleware
{
    /**
     * @var TokenStorageInterface
     */
    private TokenStorageInterface $storage;

    /**
     * @var callable
     */
    private $tokenRefreshCallback;

    /**
     * @var bool
     */
    private bool $isRefreshing = false;

    /**
     * Constructor
     *
     * @param TokenStorageInterface $storage Token storage
     * @param callable $tokenRefreshCallback Callback to refresh token
     */
    public function __construct(TokenStorageInterface $storage, callable $tokenRefreshCallback)
    {
        $this->storage = $storage;
        $this->tokenRefreshCallback = $tokenRefreshCallback;
    }

    /**
     * Invoke middleware
     *
     * @param callable $handler
     * @return callable
     * @throws \RuntimeException If token is not available
     */
    public function __invoke(callable $handler): callable
    {
        return function (RequestInterface $request, array $options) use ($handler) {
            // Пропускаем запросы на получение токена
            $uri = (string) $request->getUri();
            if (strpos($uri, '/oauth/token') !== false) {
                return $handler($request, $options);
            }

            // Проверяем и обновляем токен если нужно
            $token = null;
            if ($this->storage->isExpired() && !$this->isRefreshing) {
                $token = $this->refreshToken();
            }

            // Если токен не был обновлён, получаем из storage
            if ($token === null) {
                $token = $this->storage->getToken();
            }

            // Если токен всё ещё отсутствует, выбрасываем исключение
            if ($token === null) {
                throw new \RuntimeException(
                    'Authentication token is not available. Please authenticate first.'
                );
            }

            // Добавляем токен в заголовок
            $request = $request->withHeader('Authorization', 'Bearer ' . $token);

            return $handler($request, $options);
        };
    }

    /**
     * Refresh token
     *
     * @return string|null Refreshed token or null if refresh failed
     */
    private function refreshToken(): ?string
    {
        $this->isRefreshing = true;
        
        try {
            $callback = $this->tokenRefreshCallback;
            $tokenData = $callback();
            
            if (isset($tokenData['access_token']) && isset($tokenData['expires_in'])) {
                $this->storage->saveToken($tokenData['access_token'], $tokenData['expires_in']);
                return $tokenData['access_token'];
            }
            
            return null;
        } finally {
            $this->isRefreshing = false;
        }
    }
}
