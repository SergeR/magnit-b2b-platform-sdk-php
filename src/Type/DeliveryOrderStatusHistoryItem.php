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
    /**
     * @var string
     * @enum ('NEW', 'CREATED', 'DELIVERING_STARTED', 'ACCEPTED_AT_POINT', 'IN_COURIER_DELIVERY', 'ISSUED', 'DESTROYED', 'ACCEPTED_AT_WAREHOUSE', 'REMOVED', 'WAITING_RETURN', 'RETURN_INITIATED', 'RETURN_SEND_TO_WAREHOUSE', 'POSSIBLY_DEFECTED', 'DEFECTED', 'RETURN_ACCEPTED_AT_WAREHOUSE', 'RETURNED_TO_PROVIDER', 'CANCELED_BY_PROVIDER', 'ACCEPTED_AT_CUSTOMS')
     * @readonly
     */
    public string $status;

    /**
     * @var int
     * @readonly
     */
    private int $timestamp;

    /**
     * Constructor
     *
     * @param string $status Статус заказа (NEW, CREATED, DELIVERING_STARTED, и т.д.)
     * @param int $timestamp Unix timestamp
     */
    public function __construct(string $status, int $timestamp)
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
     * @return int
     */
    public function getTimestamp(): int
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
