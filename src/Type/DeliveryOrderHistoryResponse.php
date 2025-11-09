<?php
/**
 * DeliveryOrderHistoryResponse - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * DeliveryOrderHistoryResponse - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class DeliveryOrderHistoryResponse implements \JsonSerializable
{
    private string $trackingNumber;
    /** @var DeliveryOrderStatusHistoryItem[] */
    private array $statuses;

    /**
     * Constructor
     *
     * @param string $trackingNumber
     * @param DeliveryOrderStatusHistoryItem[] $statuses
     */
    public function __construct(string $trackingNumber, array $statuses)
    {
        $this->trackingNumber = $trackingNumber;
        $this->statuses = $statuses;
    }

    /**
     * Создать из массива
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        $statuses = [];
        if (isset($data['statuses']) && is_array($data['statuses'])) {
            foreach ($data['statuses'] as $item) {
                $statuses[] = DeliveryOrderStatusHistoryItem::fromArray($item);
            }
        }
        
        return new self($data['tracking_number'], $statuses);
    }

    /**
     * Gets trackingNumber
     *
     * @return string
     */
    public function getTrackingNumber(): string
    {
        return $this->trackingNumber;
    }

    /**
     * Gets statuses
     *
     * @return DeliveryOrderStatusHistoryItem[]
     */
    public function getStatuses(): array
    {
        return $this->statuses;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'tracking_number' => $this->trackingNumber,
            'statuses' => array_map(fn($item) => $item->toArray(), $this->statuses),
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
