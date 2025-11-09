<?php
/**
 * OrdersApi - Упрощенная версия
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
use SergeR\MagintB2BPlatformSDK\Type\Order;
use SergeR\MagintB2BPlatformSDK\Type\OrderRequest;
use SergeR\MagintB2BPlatformSDK\Type\OrderCreateResponse;
use SergeR\MagintB2BPlatformSDK\Type\OrderStatus;
use SergeR\MagintB2BPlatformSDK\Type\OrderChangeStatus;

/**
 * OrdersApi - API для работы с заказами
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class OrdersApi extends AbstractApi
{

    /**
     * Создание заказа
     *
     * @param OrderRequest $orderRequest Данные заказа
     * @return OrderCreateResponse
     * @throws ApiException
     * @throws GuzzleException
     */
    public function create(OrderRequest $orderRequest): OrderCreateResponse
    {
        $request = new Request(
            'POST',
            '/v1/orders',
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            json_encode($orderRequest, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        );

        $data = $this->sendJsonRequest($request);
        return OrderCreateResponse::fromArray($data);
    }

    /**
     * Получение детальной информации о заказе
     *
     * @param string $orderId Идентификатор заказа
     * @return Order
     * @throws ApiException
     * @throws GuzzleException
     */
    public function get(string $orderId): Order
    {
        $request = new Request(
            'GET',
            '/v1/orders/' . urlencode($orderId),
            ['Accept' => 'application/json']
        );

        $data = $this->sendJsonRequest($request);
        return Order::fromArray($data);
    }

    /**
     * Получение статуса заказа
     *
     * @param string $orderId Идентификатор заказа
     * @return OrderStatus
     * @throws ApiException
     * @throws GuzzleException
     */
    public function getStatus(string $orderId): OrderStatus
    {
        $request = new Request(
            'GET',
            '/v1/orders/' . urlencode($orderId) . '/status',
            ['Accept' => 'application/json']
        );

        $data = $this->sendJsonRequest($request);
        // API возвращает { "status": {...} }, извлекаем status
        return OrderStatus::fromArray($data['status']);
    }

    /**
     * Изменение статуса заказа
     *
     * @param string $orderId Идентификатор заказа
     * @param OrderChangeStatus $statusRequest Новый статус
     * @return void
     * @throws ApiException
     * @throws GuzzleException
     */
    public function updateStatus(string $orderId, OrderChangeStatus $statusRequest): void
    {
        $request = new Request(
            'PUT',
            '/v1/orders/' . urlencode($orderId) . '/status',
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            json_encode($statusRequest, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        );

        $this->sendRequest($request);
    }

    /**
     * Отмена заказа
     *
     * @param string $orderId Идентификатор заказа
     * @param array|null $cancelData Информация об отмене (опционально)
     * @return void
     * @throws ApiException
     * @throws GuzzleException
     */
    public function cancel(string $orderId, ?array $cancelData = null): void
    {
        $request = new Request(
            'POST',
            '/v1/orders/' . urlencode($orderId) . '/cancel',
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            $cancelData ? json_encode($cancelData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) : null
        );

        $this->sendRequest($request);
    }
}
