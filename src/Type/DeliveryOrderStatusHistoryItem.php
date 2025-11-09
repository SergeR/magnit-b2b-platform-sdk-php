<?php
/**
 * DeliveryOrderStatusHistoryItem - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

declare(strict_types=1);

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * DeliveryOrderStatusHistoryItem - Элемент истории статусов заказа
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class DeliveryOrderStatusHistoryItem implements \JsonSerializable
{
    private string $status;
    private float $timestamp;

    /**
     * Constructor
     *
     * @param string $status Статус заказа (NEW, CREATED, DELIVERING_STARTED, и т.д.)
     * @param float $timestamp Unix timestamp
     */
    public function __construct(string $status, float $timestamp)
    {
        $this->status = $status;
        $this->timestamp = $timestamp;
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
            $data['status'],
            $data['timestamp']
        );
    }

    /**
     * Gets status
     *
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * Gets timestamp
     *
     * @return float
     */
    public function getTimestamp(): float
    {
        return $this->timestamp;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'status' => $this->status,
            'timestamp' => $this->timestamp,
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
