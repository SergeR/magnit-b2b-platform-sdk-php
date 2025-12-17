<?php
/**
 * MarketplaceOrderCancelItemsResponse - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * MarketplaceOrderCancelItemsResponse - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class MarketplaceOrderCancelItemsResponse implements \JsonSerializable
{
    /**
     * @var MarketplaceOrder
     */
    private MarketplaceOrder $order;

    /**
     * Constructor
     */
    public function __construct(
        MarketplaceOrder $order
    ) {
        $this->order = $order;
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
            MarketplaceOrder::fromArray($data['order'])
        );
    }

    /**
     * Gets order
     *
     * @return MarketplaceOrder
     */
    public function getOrder(): MarketplaceOrder
    {
        return $this->order;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'order' => $this->order,
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
