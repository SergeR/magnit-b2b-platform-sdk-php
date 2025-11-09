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
    private $dir;

    /**
     * @var string[]
     */
    private $orderId;

    /**
     * @var MarketplaceFilterDateTime
     */
    private $createdAt;

    /**
     * @var MarketplaceOrderStatus
     */
    private $status;

            /**
     * Constructor
     */
    public function __construct(
        MarketplaceSortDirection $dir,
        string[] $orderId,
        MarketplaceFilterDateTime $createdAt,
        MarketplaceOrderStatus $status
    ) {
        $this->dir = $dir;
        $this->orderId = $orderId;
        $this->createdAt = $createdAt;
        $this->status = $status;
    }
        if (isset($data['order_id'])) {
            $this->orderId = $data['order_id'];
        }
        if (isset($data['created_at'])) {
            $this->createdAt = $data['created_at'];
        }
        if (isset($data['status'])) {
            $this->status = $data['status'];
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
            MarketplaceSortDirection::fromArray($data['dir']),
            $data['order_id'],
            MarketplaceFilterDateTime::fromArray($data['created_at']),
            MarketplaceOrderStatus::fromArray($data['status'])
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
     * Gets dir
     *
     * @return MarketplaceSortDirection
     */
    public function getDir()
    {
        return $this->dir;
    }

    /**
     * Gets orderId
     *
     * @return string[]
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Gets createdAt
     *
     * @return MarketplaceFilterDateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Gets status
     *
     * @return MarketplaceOrderStatus
     */
    public function getStatus()
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
        $data = [];
        
        if (isset($this->dir)) {
            $data['dir'] = $this->dir;
        }
        if (isset($this->orderId)) {
            $data['order_id'] = array_map(function($item) {
                return $item instanceof \JsonSerializable ? $item->jsonSerialize() : $item;
            }, $this->orderId);
        }
        if (isset($this->createdAt)) {
            $data['created_at'] = $this->createdAt;
        }
        if (isset($this->status)) {
            $data['status'] = $this->status;
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
