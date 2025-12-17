<?php
/**
 * Delivery - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * Delivery - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class Delivery implements \JsonSerializable
{
    /**
     * @var DeliveryTimeSlot
     */
    private DeliveryTimeSlot $timeSlot;

    /**
     * Constructor
     */
    public function __construct(
        DeliveryTimeSlot $timeSlot
    ) {
        $this->timeSlot = $timeSlot;
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
            DeliveryTimeSlot::fromArray($data['timeSlot'])
        );
    }

    /**
     * Gets timeSlot
     *
     * @return DeliveryTimeSlot
     */
    public function getTimeSlot(): DeliveryTimeSlot
    {
        return $this->timeSlot;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'timeSlot' => $this->timeSlot,
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
