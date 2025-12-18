<?php
/**
 * NomenclatureApi - Упрощенная версия
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
use SergeR\MagintB2BPlatformSDK\Type\StoresPricesItemsV1;
use SergeR\MagintB2BPlatformSDK\Type\StoresStocksItemsV1;

/**
 * NomenclatureApi - API для работы с номенклатурой
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class NomenclatureApi extends AbstractApi
{
    /**
     * Информация по ценам товаров в ТО
     *
     * @param string $storeId Идентификатор ТО в системе Магнит
     * @return StoresPricesItemsV1
     * @throws ApiException
     * @throws GuzzleException
     */
    public function getPrices(string $storeId): StoresPricesItemsV1
    {
        $request = new Request(
            'GET',
            $this->buildAbsoluteRequestUri('/v1/nomenclature/stores/' . urlencode($storeId) . '/prices'),
            ['Accept' => 'application/json']
        );

        $data = $this->sendJsonRequest($request);
        return StoresPricesItemsV1::fromArray($data);
    }

    /**
     * Информация по остаткам товаров в ТО
     *
     * @param string $storeId Идентификатор ТО в системе Магнит
     * @return StoresStocksItemsV1
     * @throws ApiException
     * @throws GuzzleException
     */
    public function getStocks(string $storeId): StoresStocksItemsV1
    {
        $request = new Request(
            'GET',
            $this->buildAbsoluteRequestUri('/v1/nomenclature/stores/' . urlencode($storeId) . '/stocks'),
            ['Accept' => 'application/json']
        );

        $data = $this->sendJsonRequest($request);
        return StoresStocksItemsV1::fromArray($data);
    }

    /**
     * Информация по дельте остатков товара в ТО
     *
     * @param string $storeId Идентификатор ТО в системе Магнит
     * @param int $timestampFrom Время с которого нужны изменения по остаткам в формате unix time в секундах
     * @return StoresStocksItemsV1
     * @throws ApiException
     * @throws GuzzleException
     */
    public function getStocksDelta(string $storeId, int $timestampFrom): StoresStocksItemsV1
    {
        $queryParams = ['timestamp_from' => $timestampFrom];
        $query = http_build_query($queryParams);

        $request = new Request(
            'GET',
            $this->buildAbsoluteRequestUri('/v1/nomenclature/stores/' . urlencode($storeId) . '/stocks_delta?' . $query),
            ['Accept' => 'application/json']
        );

        $data = $this->sendJsonRequest($request);
        return StoresStocksItemsV1::fromArray($data);
    }
}
