<?php
/**
 * AuthApi - Упрощенная версия
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Api;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use SergeR\MagintB2BPlatformSDK\ApiException;
use SergeR\MagintB2BPlatformSDK\Config;
use SergeR\MagintB2BPlatformSDK\Type\AuthRequest;
use SergeR\MagintB2BPlatformSDK\Type\OauthToken;
use SergeR\MagintB2BPlatformSDK\Type\OauthError;

/**
 * AuthApi - API для аутентификации (не использует middleware)
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class AuthApi
{
    private ClientInterface $client;
    private Config $config;

    /**
     * @param ClientInterface $client HTTP client (без middleware!)
     * @param Config $config Configuration
     */
    public function __construct(ClientInterface $client, Config $config)
    {
        $this->client = $client;
        $this->config = $config;
    }

    /**
     * @return Config
     */
    public function getConfig(): Config
    {
        return $this->config;
    }

    /**
     * Получение аутентификационного токена
     *
     * @param AuthRequest $authRequest Запрос на получение токена
     * @return OauthToken
     * @throws ApiException on 400 (validation error) or 401 (auth error)
     * @throws GuzzleException
     */
    public function getToken(AuthRequest $authRequest): OauthToken
    {
        $request = $this->getTokenRequest($authRequest);

        try {
            $response = $this->client->send($request, $this->createHttpClientOptions());
        } catch (RequestException $e) {
            $statusCode = $e->getResponse() ? $e->getResponse()->getStatusCode() : 0;
            
            // Обрабатываем только 400 и 401
            if ($statusCode === 400 || $statusCode === 401) {
                $body = $e->getResponse() ? (string) $e->getResponse()->getBody() : null;
                $data = $body ? json_decode($body, true) : null;
                
                $exception = new ApiException(
                    $statusCode === 400 
                        ? 'Validation error' 
                        : 'Authentication error',
                    $statusCode,
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $body
                );
                
                // Добавляем распарсенный OauthError в exception
                if ($data) {
                    $exception->setResponseObject(OauthError::fromArray($data));
                }
                
                throw $exception;
            }
            
            // Остальные ошибки пробрасываем как есть
            throw $e;
        }

        $data = json_decode((string) $response->getBody(), true);

        return OauthToken::fromArray($data);
    }

    /**
     * Create request for operation 'getToken'
     *
     * @param  AuthRequest $authRequest Запрос на получение токена
     * @return Request
     */
    protected function getTokenRequest(AuthRequest $authRequest): Request
    {
        $resourcePath = '/v2/oauth/token';
        
        // Формируем заголовки
        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/x-www-form-urlencoded',
        ];

        if ($this->config->getUserAgent()) {
            $headers['User-Agent'] = $this->config->getUserAgent();
        }

        // Формируем тело запроса в формате x-www-form-urlencoded
        $data = $authRequest->toArray();
        $httpBody = http_build_query($data);

        $operationHost = $this->config->getHost();
        
        return new Request(
            'POST',
            $operationHost . $resourcePath,
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @return array
     */
    protected function createHttpClientOptions(): array
    {
        return [];
    }
}
