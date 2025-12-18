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
use SergeR\MagintB2BPlatformSDK\Type\DeliveryOrdersResponse;
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
            $this->buildAbsoluteRequestUri('/v1/magnit-post/orders'),
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
            $this->buildAbsoluteRequestUri('/v1/magnit-post/orders/' . urlencode($trackingNumber)),
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
            $this->buildAbsoluteRequestUri('/v2/magnit-post/orders/estimate'),
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
//            $this->buildAbsoluteRequestUri('/v1/magnit-post/orders/' . urlencode($trackingNumber)),
            $this->buildAbsoluteRequestUri('/v1/magnit-post/orders'),
            ['Accept' => 'application/json']
        );

        $data = $this->sendJsonRequest($request);
        return DeliveryOrderResponse::fromArray($data);
    }

    /**
     * @param int|null $page
     * @param int|null $size
     * @param string|null $customerOrderId
     * @param string|null $externalOrderId
     * @param null|string $status NEW, CREATED, DELIVERING_STARTED, ACCEPTED_AT_POINT, IN_COURIER_DELIVERY, ISSUED, DESTROYED, ACCEPTED_AT_WAREHOUSE, REMOVED, WAITING_RETURN, RETURN_INITIATED, RETURN_SEND_TO_WAREHOUSE, POSSIBLY_DEFECTED, DEFECTED, RETURN_ACCEPTED_AT_WAREHOUSE, RETURNED_TO_PROVIDER, CANCELED_BY_PROVIDER, ACCEPTED_AT_CUSTOMS
     * @param \DateTimeInterface|null $createdFrom
     * @param \DateTimeInterface|null $createdTo
     * @param string|null $sortDirection
     * @return DeliveryOrdersResponse
     * @throws ApiException
     * @throws GuzzleException
     * @throws \Exception
     */
    public function getOrders(
        ?int $page = null,
        ?int $size = null,
        ?string $customerOrderId = null,
        ?string $externalOrderId = null,
        ?string $status = null,
        ?\DateTimeInterface $createdFrom = null,
        ?\DateTimeInterface $createdTo = null,
        ?string $sortDirection = null
    ): DeliveryOrdersResponse {
        $query_params = [];
        if ($page !== null) {
            $query_params['page'] = $page;
        }
        if ($size !== null) {
            $query_params['size'] = $size;
        }
        if ($customerOrderId !== null) {
            $query_params['customerOrderId'] = $customerOrderId;
        }
        if ($externalOrderId !== null) {
            $query_params['externalOrderId'] = $externalOrderId;
        }
        if ($status !== null) {
            $query_params['status'] = $status;
        }
        if ($createdFrom !== null) {
            $createdFrom = new \DateTimeImmutable($createdFrom->format(\DateTimeInterface::ATOM));
            $createdFrom = $createdFrom->setTimezone(new \DateTimeZone('UTC'));
            $query_params['createdFrom'] = $createdFrom->format('Y-m-d\TH:i:s.v\Z');
        }
        if ($createdTo !== null) {
            $createdTo = new \DateTimeImmutable($createdTo->format(\DateTimeInterface::ATOM));
            $createdTo = $createdTo->setTimezone(new \DateTimeZone('UTC'));
            $query_params['createdTo'] = $createdTo->format('Y-m-d\TH:i:s.v\Z');
        }
        if ($sortDirection !== null) {
            $query_params['sortDirection'] = $sortDirection;
        }

        $request = new Request(
            'GET',
            $this->buildAbsoluteRequestUri(
                '/v1/magnit-post/orders' . ($query_params ? '?' . http_build_query($query_params) : '')
            ),
            ['Accept' => 'application/json']
        );

        $data = $this->sendJsonRequest($request);

        return DeliveryOrdersResponse::fromArray($data);
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
            $this->buildAbsoluteRequestUri('/v1/magnit-post/orders/' . urlencode($trackingNumber) . '/status-history'),
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
            $this->buildAbsoluteRequestUri('/v1/magnit-post/order-statuses'),
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
            $this->buildAbsoluteRequestUri('/v1/magnit-post/pickup-points?' . $query),
            ['Accept' => 'application/json']
        );

        $data = $this->sendJsonRequest($request);
        return PickupPointsResponse::fromArray($data);
    }
}
