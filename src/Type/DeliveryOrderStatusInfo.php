<?php
/**
 * DeliveryOrderStatusInfo - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

declare(strict_types=1);

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * DeliveryOrderStatusInfo - Информация о статусе заказа
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class DeliveryOrderStatusInfo implements \JsonSerializable
{
    private string $trackingNumber;
    private string $status;

    /**
     * Constructor
     *
     * @param string $trackingNumber Трек-номер заказа
     * @param string $status Статус заказа (NEW, CREATED, DELIVERING_STARTED, и т.д.)
     */
    public function __construct(string $trackingNumber, string $status)
    {
        $this->trackingNumber = $trackingNumber;
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
            $data['tracking_number'],
            $data['status']
        );
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
     * Gets status
     *
     * @return string
     */
    public function getStatus(): string
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
            'tracking_number' => $this->trackingNumber,
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
