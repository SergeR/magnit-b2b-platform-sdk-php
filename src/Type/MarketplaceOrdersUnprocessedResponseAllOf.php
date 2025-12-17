<?php
/**
 * MarketplaceOrdersUnprocessedResponseAllOf - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * MarketplaceOrdersUnprocessedResponseAllOf - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class MarketplaceOrdersUnprocessedResponseAllOf implements \JsonSerializable
{
    /**
     * @var MarketplaceOrder[]
     */
    private array $orders;

    /**
     * Constructor
     */
    public function __construct(
        array $orders
    ) {
        $this->orders = $orders;
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
            isset($data['orders']) ? array_map(fn($item) => MarketplaceOrder::fromArray($item), $data['orders']) : []
        );
    }

    /**
     * Gets orders
     *
     * @return MarketplaceOrder[]
     */
    public function getOrders(): array
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
        return [
            'orders' => array_map(fn($item) => $item->jsonSerialize(), $this->orders),
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
