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
    private string $orderId;

    /**
     * @var MarketplaceOrderStatus
     */
    private MarketplaceOrderStatus $status;

    /**
     * @var \DateTime
     */
    private \DateTime $cutoffTime;

    /**
     * @var MarketplaceOrderItem[]
     */
    private array $items;

    /**
     * Constructor
     */
    public function __construct(
        string $orderId,
        MarketplaceOrderStatus $status,
        \DateTime $cutoffTime,
        array $items
    ) {
        $this->orderId = $orderId;
        $this->status = $status;
        $this->cutoffTime = $cutoffTime;
        $this->items = $items;
    }

    /**
     * Создать из массива
     *
     * @param array $data
     * @return self
     * @throws \Exception
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['orderId'],
            MarketplaceOrderStatus::fromArray($data['status']),
            new \DateTime($data['cutoffTime']),
            isset($data['items']) ? array_map(fn($item) => MarketplaceOrderItem::fromArray($item), $data['items']) : []
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
     * Gets status
     *
     * @return MarketplaceOrderStatus
     */
    public function getStatus(): MarketplaceOrderStatus
    {
        return $this->status;
    }

    /**
     * Gets cutoffTime
     *
     * @return \DateTime
     */
    public function getCutoffTime(): \DateTime
    {
        return $this->cutoffTime;
    }

    /**
     * Gets items
     *
     * @return MarketplaceOrderItem[]
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
            'status' => $this->status,
            'cutoffTime' => $this->cutoffTime->format(\DateTimeInterface::ATOM),
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
