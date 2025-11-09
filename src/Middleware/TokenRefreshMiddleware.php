<?php
/**
 * TokenRefreshMiddleware
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK\Middleware
 */

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
    private $storage;

    /**
     * @var callable
     */
    private $tokenRefreshCallback;

    /**
     * @var bool
     */
    private $isRefreshing = false;

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
            if ($this->storage->isExpired() && !$this->isRefreshing) {
                $this->refreshToken();
            }

            // Добавляем токен в заголовок
            $token = $this->storage->getToken();
            if ($token) {
                $request = $request->withHeader('Authorization', 'Bearer ' . $token);
            }

            return $handler($request, $options);
        };
    }

    /**
     * Refresh token
     *
     * @return void
     */
    private function refreshToken(): void
    {
        $this->isRefreshing = true;
        
        try {
            $callback = $this->tokenRefreshCallback;
            $tokenData = $callback();
            
            if (isset($tokenData['access_token']) && isset($tokenData['expires_in'])) {
                $this->storage->saveToken($tokenData['access_token'], $tokenData['expires_in']);
            }
        } finally {
            $this->isRefreshing = false;
        }
    }
}
