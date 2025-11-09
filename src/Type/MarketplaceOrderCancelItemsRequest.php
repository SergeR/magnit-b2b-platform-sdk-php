<?php
/**
 * MarketplaceOrderCancelItemsRequest - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * MarketplaceOrderCancelItemsRequest - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class MarketplaceOrderCancelItemsRequest implements \JsonSerializable
{
    /**
     * @var string
     */
    private $orderId;

    /**
     * @var MarketplaceSkuItem[]
     */
    private $items;

            /**
     * Constructor
     */
    public function __construct(
        string $orderId,
        MarketplaceSkuItem[] $items
    ) {
        $this->orderId = $orderId;
        $this->items = $items;
    }
        if (isset($data['items'])) {
            $this->items = $data['items'];
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
            $data['order_id'],
            isset($data['items']) ? array_map(fn($item) => MarketplaceSkuItem::fromArray($item), $data['items']) : []
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
     * Gets orderId
     *
     * @return string
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Gets items
     *
     * @return MarketplaceSkuItem[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = [];
        
        if (isset($this->orderId)) {
            $data['order_id'] = $this->orderId;
        }
        if (isset($this->items)) {
            $data['items'] = array_map(function($item) {
                return $item instanceof \JsonSerializable ? $item->jsonSerialize() : $item;
            }, $this->items);
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
