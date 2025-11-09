<?php
/**
 * MagnitPostApi - Упрощенная версия
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
use SergeR\MagintB2BPlatformSDK\Type\DeliveryOrderRequest;
use SergeR\MagintB2BPlatformSDK\Type\DeliveryOrderResponse;
use SergeR\MagintB2BPlatformSDK\Type\DeliveryOrderStatusInfo;
use SergeR\MagintB2BPlatformSDK\Type\EstimateOrderRequest;
use SergeR\MagintB2BPlatformSDK\Type\EstimateOrderResponse;
use SergeR\MagintB2BPlatformSDK\Type\DeliveryOrderHistoryResponse;
use SergeR\MagintB2BPlatformSDK\Type\DeliveryOrderStatusesRequest;
use SergeR\MagintB2BPlatformSDK\Type\PickupPointsResponse;

/**
 * MagnitPostApi - API для работы с Магнит Пост
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class MagnitPostApi extends AbstractApi
{
    /**
     * Создать заказ
     *
     * @param DeliveryOrderRequest $orderRequest Данные заказа
     * @return DeliveryOrderResponse
     * @throws ApiException
     * @throws GuzzleException
     */
    public function createOrder(DeliveryOrderRequest $orderRequest): DeliveryOrderResponse
    {
        $request = new Request(
            'POST',
            '/v1/magnit-post/orders',
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            json_encode($orderRequest, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        );

        $data = $this->sendJsonRequest($request);
        return DeliveryOrderResponse::fromArray($data);
    }

    /**
     * Отменить заказ по trackingNumber
     *
     * @param string $trackingNumber Трек-номер заказа
     * @return void
     * @throws ApiException
     * @throws GuzzleException
     */
    public function deleteOrder(string $trackingNumber): void
    {
        $request = new Request(
            'DELETE',
            '/v1/magnit-post/orders/' . urlencode($trackingNumber),
            ['Accept' => 'application/json']
        );

        $this->sendRequest($request);
    }

    /**
     * Расчет срока и стоимости доставки
     *
     * @param EstimateOrderRequest $estimateRequest Данные для расчета
     * @return EstimateOrderResponse
     * @throws ApiException
     * @throws GuzzleException
     */
    public function estimateOrder(EstimateOrderRequest $estimateRequest): EstimateOrderResponse
    {
        $request = new Request(
            'POST',
            '/v2/magnit-post/orders/estimate',
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            json_encode($estimateRequest, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        );

        $data = $this->sendJsonRequest($request);
        return EstimateOrderResponse::fromArray($data);
    }

    /**
     * Получить заказ по trackingNumber
     *
     * @param string $trackingNumber Трек-номер заказа
     * @return DeliveryOrderResponse
     * @throws ApiException
     * @throws GuzzleException
     */
    public function getOrder(string $trackingNumber): DeliveryOrderResponse
    {
        $request = new Request(
            'GET',
            '/v1/magnit-post/orders/' . urlencode($trackingNumber),
            ['Accept' => 'application/json']
        );

        $data = $this->sendJsonRequest($request);
        return DeliveryOrderResponse::fromArray($data);
    }

    /**
     * Получить историю статусов по заказу на доставку
     *
     * @param string $trackingNumber Трек-номер заказа
     * @return DeliveryOrderHistoryResponse
     * @throws ApiException
     * @throws GuzzleException
     */
    public function getOrderStatusHistory(string $trackingNumber): DeliveryOrderHistoryResponse
    {
        $request = new Request(
            'GET',
            '/v1/magnit-post/orders/' . urlencode($trackingNumber) . '/status-history',
            ['Accept' => 'application/json']
        );

        $data = $this->sendJsonRequest($request);
        return DeliveryOrderHistoryResponse::fromArray($data);
    }

    /**
     * Получить актуальные статусы по нескольким заказам
     *
     * @param DeliveryOrderStatusesRequest $statusesRequest Список трек-номеров
     * @return array Array of DeliveryOrderStatusInfo
     * @throws ApiException
     * @throws GuzzleException
     */
    public function getOrdersStatuses(DeliveryOrderStatusesRequest $statusesRequest): array
    {
        $request = new Request(
            'POST',
            '/v1/magnit-post/order-statuses',
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            json_encode($statusesRequest, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        );

        $data = $this->sendJsonRequest($request);
        
        // Возвращаем массив DeliveryOrderStatusInfo
        $result = [];
        foreach ($data as $item) {
            $result[] = DeliveryOrderStatusInfo::fromArray($item);
        }
        
        return $result;
    }

    /**
     * Получить список пунктов выдачи заказов
     *
     * @param int $page Номер страницы, начинающийся с единицы (1..N)
     * @param int $size Размер возвращаемой страницы
     * @param string|null $key Ключ пункта выдачи заказа (optional)
     * @param string|null $region Регион ПВЗ (optional)
     * @param string|null $city Город ПВЗ (optional)
     * @return PickupPointsResponse
     * @throws ApiException
     * @throws GuzzleException
     */
    public function getPickupPoints(
        int $page,
        int $size,
        ?string $key = null,
        ?string $region = null,
        ?string $city = null
    ): PickupPointsResponse {
        $queryParams = [
            'page' => $page,
            'size' => $size,
        ];
        
        if ($key !== null) {
            $queryParams['key'] = $key;
        }
        if ($region !== null) {
            $queryParams['region'] = $region;
        }
        if ($city !== null) {
            $queryParams['city'] = $city;
        }
        
        $query = http_build_query($queryParams);
        
        $request = new Request(
            'GET',
            '/v1/magnit-post/pickup-points?' . $query,
            ['Accept' => 'application/json']
        );

        $data = $this->sendJsonRequest($request);
        return PickupPointsResponse::fromArray($data);
    }
}
