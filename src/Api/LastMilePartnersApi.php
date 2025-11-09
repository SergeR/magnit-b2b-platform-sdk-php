<?php
/**
 * LastMilePartnersApi - API для работы с партнерами последней мили
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

declare(strict_types=1);

namespace SergeR\MagintB2BPlatformSDK\Api;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use SergeR\MagintB2BPlatformSDK\ApiException;
use SergeR\MagintB2BPlatformSDK\Type\Partner;
use SergeR\MagintB2BPlatformSDK\Type\PartnerConfig;
use SergeR\MagintB2BPlatformSDK\Type\UpdatePartnerRequest;

/**
 * LastMilePartnersApi - API для работы с партнерами последней мили
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class LastMilePartnersApi extends AbstractApi
{
    /**
     * Получить информацию о партнере
     *
     * @param string $partnerId ID партнера
     * @param bool $nomerge Флаг получения несмерженного конфига (по умолчанию false)
     * @return Partner
     * @throws ApiException
     * @throws GuzzleException
     */
    public function get(string $partnerId, bool $nomerge = false): Partner
    {
        $uri = '/v1/partners/' . urlencode($partnerId);
        if ($nomerge) {
            $uri .= '?nomerge=true';
        }

        $request = new Request(
            'GET',
            $uri,
            ['Accept' => 'application/json']
        );

        $data = $this->sendJsonRequest($request);
        return Partner::fromArray($data);
    }

    /**
     * Обновить партнера
     *
     * @param string $partnerId ID партнера
     * @param UpdatePartnerRequest $updateRequest Данные для обновления партнера
     * @return void
     * @throws ApiException
     * @throws GuzzleException
     */
    public function update(string $partnerId, UpdatePartnerRequest $updateRequest): void
    {
        $request = new Request(
            'PUT',
            '/v1/partners/' . urlencode($partnerId),
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            json_encode($updateRequest, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        );

        $this->sendRequest($request);
    }

    /**
     * Получить конфиг партнера в логзоне
     *
     * @param string $partnerId ID партнера
     * @param string $by Критерий выборки логзоны (например, 'logzone_id', 'store_id')
     * @param string|null $stype Тип настроек в логзонах (опционально)
     * @return PartnerConfig
     * @throws ApiException
     * @throws GuzzleException
     */
    public function getLogzoneConfig(string $partnerId, string $by, ?string $stype = null): PartnerConfig
    {
        $queryParams = ['by' => $by];
        if ($stype !== null) {
            $queryParams['stype'] = $stype;
        }

        $query = http_build_query($queryParams);
        $request = new Request(
            'GET',
            '/v1/partners/' . urlencode($partnerId) . '/logzone-config?' . $query,
            ['Accept' => 'application/json']
        );

        $data = $this->sendJsonRequest($request);
        return PartnerConfig::fromArray($data);
    }

    /**
     * Обновить конфиг партнера в логзоне
     *
     * @param string $partnerId ID партнера
     * @param PartnerConfig $config Конфигурация логзоны
     * @return void
     * @throws ApiException
     * @throws GuzzleException
     */
    public function updateLogzoneConfig(string $partnerId, PartnerConfig $config): void
    {
        $request = new Request(
            'PUT',
            '/v1/partners/' . urlencode($partnerId) . '/logzone-config',
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            json_encode($config, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        );

        $this->sendRequest($request);
    }
}
