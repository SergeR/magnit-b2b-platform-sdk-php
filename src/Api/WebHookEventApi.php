<?php
/**
 * WebHookEventApi - Упрощенная версия
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
use SergeR\MagintB2BPlatformSDK\Type\Event;

/**
 * WebHookEventApi - API для получения событий от системы Магнит
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class WebHookEventApi extends AbstractApi
{
    /**
     * Получение событий от системы Магнит
     *
     * @param Event $event Данные события
     * @return void
     * @throws ApiException
     * @throws GuzzleException
     */
    public function rootPost(Event $event): void
    {
        $request = new Request(
            'POST',
            $this->buildAbsoluteRequestUri('/'),
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            json_encode($event, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        );

        $this->sendRequest($request);
    }
}
