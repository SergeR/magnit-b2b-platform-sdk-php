<?php
/**
 * MarketplaceOrder - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * MarketplaceOrder - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class MarketplaceOrder implements \JsonSerializable
{
    /**
     * @var string
     */
    private $orderId;

    /**
     * @var MarketplaceOrderStatus
     */
    private $status;

    /**
     * @var \DateTime
     */
    private $cutoffTime;

    /**
     * @var MarketplaceOrderItem[]
     */
    private $items;

            /**
     * Constructor
     */
    public function __construct(
        string $orderId,
        MarketplaceOrderStatus $status,
        \DateTime $cutoffTime,
        MarketplaceOrderItem[] $items
    ) {
        $this->orderId = $orderId;
        $this->status = $status;
        $this->cutoffTime = $cutoffTime;
        $this->items = $items;
    }
        if (isset($data['status'])) {
            $this->status = $data['status'];
        }
        if (isset($data['cutoff_time'])) {
            $this->cutoffTime = $data['cutoff_time'];
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
            MarketplaceOrderStatus::fromArray($data['status']),
            \DateTime::fromArray($data['cutoff_time']),
            isset($data['items']) ? array_map(fn($item) => MarketplaceOrderItem::fromArray($item), $data['items']) : []
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
     * Gets status
     *
     * @return MarketplaceOrderStatus
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Gets cutoffTime
     *
     * @return \DateTime
     */
    public function getCutoffTime()
    {
        return $this->cutoffTime;
    }

    /**
     * Gets items
     *
     * @return MarketplaceOrderItem[]
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
        if (isset($this->status)) {
            $data['status'] = $this->status;
        }
        if (isset($this->cutoffTime)) {
            $data['cutoff_time'] = $this->cutoffTime instanceof \JsonSerializable ? $this->cutoffTime->jsonSerialize() : $this->cutoffTime;
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
