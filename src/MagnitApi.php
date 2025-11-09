<?php
/**
 * MagnitApi - Единая точка входа для работы с Magnit B2B Platform API
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

declare(strict_types=1);

namespace SergeR\MagintB2BPlatformSDK;

use SergeR\MagintB2BPlatformSDK\Api\OrdersApi;
use SergeR\MagintB2BPlatformSDK\Api\MagnitPostApi;

/**
 * MagnitApi - Фасад для доступа ко всем API
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 * 
 * @property-read OrdersApi $orders API для работы с заказами
 * @property-read MagnitPostApi $magnitPost API для работы с Магнит Пост
 */
class MagnitApi
{
    private MagnitClient $client;
    private ?OrdersApi $ordersApi = null;
    private ?MagnitPostApi $magnitPostApi = null;

    /**
     * Constructor
     *
     * @param MagnitClient $client HTTP клиент с на��троенной авторизацией
     */
    public function __construct(MagnitClient $client)
    {
        $this->client = $client;
    }

    /**
     * Получить API для работы с заказами
     *
     * @return OrdersApi
     */
    public function orders(): OrdersApi
    {
        if ($this->ordersApi === null) {
            $this->ordersApi = new OrdersApi($this->client);
        }
        return $this->ordersApi;
    }

    /**
     * Получить API для работы с Магнит Пост
     *
     * @return MagnitPostApi
     */
    public function magnitPost(): MagnitPostApi
    {
        if ($this->magnitPostApi === null) {
            $this->magnitPostApi = new MagnitPostApi($this->client);
        }
        return $this->magnitPostApi;
    }

    /**
     * Magic getter для доступа к API через свойства
     *
     * @param string $name
     * @return OrdersApi|MagnitPostApi
     * @throws \InvalidArgumentException
     */
    public function __get(string $name)
    {
        switch ($name) {
            case 'orders':
                return $this->orders();
            case 'magnitPost':
                return $this->magnitPost();
            default:
                throw new \InvalidArgumentException("Unknown API: {$name}");
        }
    }
}
