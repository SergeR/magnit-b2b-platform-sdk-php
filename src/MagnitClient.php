<?php
/**
 * MagnitClient
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

declare(strict_types=1);

namespace SergeR\MagintB2BPlatformSDK;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\HandlerStack;
use SergeR\MagintB2BPlatformSDK\Middleware\AuthorizationMiddleware;
use SergeR\MagintB2BPlatformSDK\Middleware\TokenRefreshMiddleware;
use SergeR\MagintB2BPlatformSDK\Middleware\LoggerMiddleware;
use SergeR\MagintB2BPlatformSDK\TokenStorage\TokenStorageInterface;
use SergeR\MagintB2BPlatformSDK\Api\AuthApi;

/**
 * Main Magnit API Client
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class MagnitClient
{
    private ClientInterface $httpClient;
    private Config $config;
    private TokenStorageInterface $tokenStorage;

    /**
     * Constructor
     *
     * @param Config $config Configuration instance
     * @param TokenStorageInterface $tokenStorage Token storage implementation
     */
    public function __construct(
        Config $config,
        TokenStorageInterface $tokenStorage
    ) {
        $this->config = $config;
        $this->tokenStorage = $tokenStorage;

        // Создаём HTTP клиент с middleware
        $this->httpClient = $this->createHttpClient();
    }

    /**
     * Create HTTP client with middleware
     *
     * @return ClientInterface
     */
    private function createHttpClient(): ClientInterface
    {
        $stack = HandlerStack::create();

        // Порядок важен! Middleware выполняются в обратном порядке (LIFO)
        // Поэтому добавляем в обратном порядке выполнения:

        // 1. Добавляем middleware для автоматического обновления токена (выполнится первым)
        $tokenRefreshCallback = function () {
            return $this->refreshToken();
        };
        $tokenMiddleware = new TokenRefreshMiddleware($this->tokenStorage, $tokenRefreshCallback);
        $stack->push($tokenMiddleware);

        // 2. Добавляем middleware для автоматического добавления Authorization заголовка (выполнится вторым)
        $authMiddleware = new AuthorizationMiddleware($this->tokenStorage);
        $stack->push($authMiddleware);

        // 3. Добавляем middleware для логирования (выполнится последним, увидит все заголовки)
        if ($this->config->getLogger()) {
            $loggerMiddleware = new LoggerMiddleware($this->config->getLogger());
            $stack->push($loggerMiddleware);
        }

        return new Client([
            'handler' => $stack,
            'base_uri' => $this->config->getHost(),
            'headers' => [
                'User-Agent' => $this->config->getUserAgent(),
            ],
        ]);
    }

    /**
     * Refresh OAuth token
     *
     * @return array Token data
     * @throws GuzzleException
     */
    private function refreshToken(): array
    {
        // Создаём временный HTTP клиент без middleware для получения токена
        $tempClient = new Client([
            'base_uri' => $this->config->getHost(),
            'headers' => [
                'User-Agent' => $this->config->getUserAgent(),
            ],
        ]);

        $authApi = new AuthApi($tempClient, $this->config);

        $authRequest = new Type\AuthRequest(
            $this->config->getClientId(),
            $this->config->getClientSecret(),
            $this->config->getScope(),
            'client_credentials'
        );

        try {
            $response = $authApi->getToken($authRequest);
            
            return [
                'access_token' => $response->getAccessToken(),
                'expires_in' => $response->getExpiresIn()
            ];
        } catch (\Exception $e) {
            throw new \Exception('Failed to refresh token: ' . $e->getMessage(), 0, $e);
        }
    }

    /**
     * Get HTTP client
     *
     * @return ClientInterface
     */
    public function getHttpClient(): ClientInterface
    {
        return $this->httpClient;
    }

    /**
     * Get configuration
     *
     * @return Config
     */
    public function getConfig(): Config
    {
        return $this->config;
    }

    /**
     * Get token storage
     *
     * @return TokenStorageInterface
     */
    public function getTokenStorage(): TokenStorageInterface
    {
        return $this->tokenStorage;
    }

    /**
     * Manually set access token (optional, for testing)
     *
     * @param string $token Access token
     * @param int $expiresIn Token lifetime in seconds
     * @return self
     */
    public function setAccessToken(string $token, int $expiresIn = 3600): self
    {
        $this->tokenStorage->saveToken($token, $expiresIn);
        return $this;
    }

    /**
     * Clear stored token
     *
     * @return self
     */
    public function clearToken(): self
    {
        $this->tokenStorage->clear();
        return $this;
    }
}
