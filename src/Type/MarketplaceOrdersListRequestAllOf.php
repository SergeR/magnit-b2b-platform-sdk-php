<?php
/**
 * MarketplaceOrdersListRequestAllOf - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * MarketplaceOrdersListRequestAllOf - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class MarketplaceOrdersListRequestAllOf implements \JsonSerializable
{
    /**
     * @var MarketplaceSortDirection
     */
    private MarketplaceSortDirection $dir;

    /**
     * @var string[]
     */
    private array $orderId;

    /**
     * @var MarketplaceFilterDateTime
     */
    private MarketplaceFilterDateTime $createdAt;

    /**
     * @var MarketplaceOrderStatus
     */
    private MarketplaceOrderStatus $status;

    /**
     * Constructor
     */
    public function __construct(
        MarketplaceSortDirection $dir,
        array $orderId,
        MarketplaceFilterDateTime $createdAt,
        MarketplaceOrderStatus $status
    ) {
        $this->dir = $dir;
        $this->orderId = $orderId;
        $this->createdAt = $createdAt;
        $this->status = $status;
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
            MarketplaceSortDirection::fromArray($data['dir']),
            $data['orderId'],
            MarketplaceFilterDateTime::fromArray($data['createdAt']),
            MarketplaceOrderStatus::fromArray($data['status'])
        );
    }

    /**
     * Gets dir
     *
     * @return MarketplaceSortDirection
     */
    public function getDir(): MarketplaceSortDirection
    {
        return $this->dir;
    }

    /**
     * Gets orderId
     *
     * @return string[]
     */
    public function getOrderId(): array
    {
        return $this->orderId;
    }

    /**
     * Gets createdAt
     *
     * @return MarketplaceFilterDateTime
     */
    public function getCreatedAt(): MarketplaceFilterDateTime
    {
        return $this->createdAt;
    }

    /**
     * Gets status
     *
     * @return MarketplaceOrderStatus
     */
    public function getStatus(): MarketplaceOrderStatus
    {
        return $this->status;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'dir' => $this->dir,
            'orderId' => $this->orderId,
            'createdAt' => $this->createdAt,
            'status' => $this->status,
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
