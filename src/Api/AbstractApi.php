<?php
/**
 * AbstractApi - Абстрактный базовый класс для всех API
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

declare(strict_types=1);

namespace SergeR\MagintB2BPlatformSDK\Api;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use SergeR\MagintB2BPlatformSDK\ApiException;
use SergeR\MagintB2BPlatformSDK\MagnitClient;

/**
 * AbstractApi - Абстрактный базовый класс для API
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
abstract class AbstractApi
{
    protected ClientInterface $client;

    /**
     * @param MagnitClient $client Magnit API client
     */
    public function __construct(MagnitClient $client)
    {
        $this->client = $client->getHttpClient();
    }

    /**
     * Отправить HTTP запрос
     *
     * @param RequestInterface $request
     * @return ResponseInterface
     * @throws ApiException
     * @throws GuzzleException
     */
    protected function sendRequest(RequestInterface $request): ResponseInterface
    {
        try {
            return $this->client->send($request);
        } catch (RequestException $e) {
            throw new ApiException(
                "[{$e->getCode()}] {$e->getMessage()}",
                (int) $e->getCode(),
                $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                $e->getResponse() ? (string) $e->getResponse()->getBody() : null
            );
        }
    }

    /**
     * Отправить запрос и декодировать JSON ответ
     *
     * @param RequestInterface $request
     * @return array
     * @throws ApiException
     * @throws GuzzleException
     */
    protected function sendJsonRequest(RequestInterface $request): array
    {
        $response = $this->sendRequest($request);
        return json_decode((string) $response->getBody(), true);
    }
}
