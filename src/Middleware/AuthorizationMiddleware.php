<?php
/**
 * AuthorizationMiddleware - Добавляет Authorization заголовок к запросам
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

declare(strict_types=1);

namespace SergeR\MagintB2BPlatformSDK\Middleware;

use Psr\Http\Message\RequestInterface;
use SergeR\MagintB2BPlatformSDK\TokenStorage\TokenStorageInterface;

/**
 * Middleware для автоматического добавления Authorization заголовка
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class AuthorizationMiddleware
{
    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * Constructor
     *
     * @param TokenStorageInterface $tokenStorage
     */
    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
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
            // Пропускаем запросы к /oauth/token (получение токена)
            $path = $request->getUri()->getPath();
            if (strpos($path, '/oauth/token') !== false) {
                return $handler($request, $options);
            }

            // Получаем токен из хранилища
            $token = $this->tokenStorage->getToken();

            // Если токен есть, добавляем Authorization заголовок
            if ($token) {
                $request = $request->withHeader('Authorization', 'Bearer ' . $token);
            }

            return $handler($request, $options);
        };
    }
}
