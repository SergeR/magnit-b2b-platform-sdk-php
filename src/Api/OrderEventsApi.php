<?php
/**
 * OrderEventsApi - Упрощенная версия
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
use SergeR\MagintB2BPlatformSDK\Type\V1OrdersOrderIdEventPostRequest;

/**
 * OrderEventsApi - API для работы с событиями заказов
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class OrderEventsApi extends AbstractApi
{
    /**
     * Отправить событие по заказу от Партнера
     *
     * @param string $orderId Идентификатор заказа в системе Магнита
     * @param V1OrdersOrderIdEventPostRequest $eventRequest Событие по заказу
     * @return void
     * @throws ApiException
     * @throws GuzzleException
     */
    public function sendOrderEvent(string $orderId, V1OrdersOrderIdEventPostRequest $eventRequest): void
    {
        $request = new Request(
            'POST',
            $this->buildAbsoluteRequestUri('/v1/orders/' . urlencode($orderId) . '/event'),
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            json_encode($eventRequest, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        );

        $this->sendRequest($request);
    }
}
