<?php
/**
 * LastMileApi - Фасад для работы с доставкой последней мили
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

declare(strict_types=1);

namespace SergeR\MagintB2BPlatformSDK\Api;

use GuzzleHttp\Exception\GuzzleException;
use SergeR\MagintB2BPlatformSDK\ApiException;

/**
 * LastMileApi - Фасад для работы с доставкой последней мили
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 * 
 * @property-read LastMileClaimsApi $claims API для работы с заявками
 * @property-read LastMilePartnersApi $partners API для работы с партнерами
 */
class LastMileApi extends AbstractApi
{
    private ?LastMileClaimsApi $claimsApi = null;
    private ?LastMilePartnersApi $partnersApi = null;

    /**
     * Получить API для работы с заявками
     *
     * @return LastMileClaimsApi
     */
    public function claims(): LastMileClaimsApi
    {
        if ($this->claimsApi === null) {
            $this->claimsApi = new LastMileClaimsApi($this->magnitClient);
        }
        return $this->claimsApi;
    }

    /**
     * Получить API для работы с партнерами
     *
     * @return LastMilePartnersApi
     */
    public function partners(): LastMilePartnersApi
    {
        if ($this->partnersApi === null) {
            $this->partnersApi = new LastMilePartnersApi($this->magnitClient);
        }
        return $this->partnersApi;
    }

    /**
     * Заменить тарифы партнера
     *
     * @param string $partnerId ID партнера
     * @param string $filePath Путь к файлу с тарифами
     * @return void
     * @throws ApiException
     * @throws GuzzleException
     */
    public function replaceRates(string $partnerId, string $filePath): void
    {
        if (!file_exists($filePath)) {
            throw new \InvalidArgumentException("File not found: {$filePath}");
        }

        $this->sendMultipartRequest(
            'POST',
            '/v1/partners/' . urlencode($partnerId) . '/rates',
            [
                [
                    'name' => 'file',
                    'contents' => fopen($filePath, 'r'),
                    'filename' => basename($filePath),
                ]
            ]
        );
    }

    /**
     * Magic getter для доступа к API через свойства
     *
     * @param string $name
     * @return LastMileClaimsApi|LastMilePartnersApi
     * @throws \InvalidArgumentException
     */
    public function __get(string $name)
    {
        switch ($name) {
            case 'claims':
                return $this->claims();
            case 'partners':
                return $this->partners();
            default:
                throw new \InvalidArgumentException("Unknown API: $name");
        }
    }

}
