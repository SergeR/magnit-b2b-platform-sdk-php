<?php
/**
 * MarketplaceOrdersListResponse - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * MarketplaceOrdersListResponse - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class MarketplaceOrdersListResponse implements \JsonSerializable
{
    /**
     * @var string
     */
    private string $nextPageToken;

    /**
     * @var MarketplaceOrder[]
     */
    private array $orders;

    /**
     * Constructor
     */
    public function __construct(
        string $nextPageToken,
        array $orders
    ) {
        $this->nextPageToken = $nextPageToken;
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
            $data['nextPageToken'],
            isset($data['orders']) ? array_map(fn($item) => MarketplaceOrder::fromArray($item), $data['orders']) : []
        );
    }

    /**
     * Gets nextPageToken
     *
     * @return string
     */
    public function getNextPageToken(): string
    {
        return $this->nextPageToken;
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
            'nextPageToken' => $this->nextPageToken,
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
