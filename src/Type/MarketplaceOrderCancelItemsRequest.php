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
    private string $orderId;

    /**
     * @var MarketplaceSkuItem[]
     */
    private array $items;

    /**
     * Constructor
     */
    public function __construct(
        string $orderId,
        array $items
    ) {
        $this->orderId = $orderId;
        $this->items = $items;
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
            $data['orderId'],
            isset($data['items']) ? array_map(fn($item) => MarketplaceSkuItem::fromArray($item), $data['items']) : []
        );
    }

    /**
     * Gets orderId
     *
     * @return string
     */
    public function getOrderId(): string
    {
        return $this->orderId;
    }

    /**
     * Gets items
     *
     * @return MarketplaceSkuItem[]
     */
    public function getItems(): array
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
        return [
            'orderId' => $this->orderId,
            'items' => array_map(fn($item) => $item->jsonSerialize(), $this->items),
        ];
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
}
