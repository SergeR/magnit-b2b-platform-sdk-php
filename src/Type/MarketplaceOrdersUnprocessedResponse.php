<?php
/**
 * MarketplaceOrdersUnprocessedResponse - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * MarketplaceOrdersUnprocessedResponse - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class MarketplaceOrdersUnprocessedResponse implements \JsonSerializable
{
    /**
     * @var string
     */
    private $nextPageToken;

    /**
     * @var MarketplaceOrder[]
     */
    private $orders;

            /**
     * Constructor
     */
    public function __construct(
        string $nextPageToken,
        MarketplaceOrder[] $orders
    ) {
        $this->nextPageToken = $nextPageToken;
        $this->orders = $orders;
    }
        if (isset($data['orders'])) {
            $this->orders = $data['orders'];
        }
    }

            /**
     * Создать из массива
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['next_page_token'],
            isset($data['orders']) ? array_map(fn($item) => MarketplaceOrder::fromArray($item), $data['orders']) : []
        );
    }

    /**
     * Создать из JSON
     *
     * @param string $json
     * @return self
     */
    public static function fromJson(string $json): self
    {
        $data = json_decode($json, true);
        return new self($data ?? []);
    }

    /**
     * Gets nextPageToken
     *
     * @return string
     */
    public function getNextPageToken()
    {
        return $this->nextPageToken;
    }

    /**
     * Gets orders
     *
     * @return MarketplaceOrder[]
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = [];
        
        if (isset($this->nextPageToken)) {
            $data['next_page_token'] = $this->nextPageToken;
        }
        if (isset($this->orders)) {
            $data['orders'] = array_map(function($item) {
                return $item instanceof \JsonSerializable ? $item->jsonSerialize() : $item;
            }, $this->orders);
        }
        
        return $data;
    }

    /**
     * Реализация JsonSerializable
     *
     * @return array
     */
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    /**
     * Преобразовать в JSON строку
     *
     * @return string
     */
    public function toJson(): string
    {
        return json_encode($this->toArray());
    }

    /**
     * Строковое представление
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
