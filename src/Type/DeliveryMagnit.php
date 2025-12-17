<?php
/**
 * DeliveryMagnit - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * DeliveryMagnit - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class DeliveryMagnit implements \JsonSerializable
{
    /**
     * @var DeliveryTimeSlot
     */
    private DeliveryTimeSlot $timeSlot;

    /**
     * @var DeliveryPrice
     */
    private DeliveryPrice $price;

    /**
     * @var DeliveryCoordinates
     */
    private DeliveryCoordinates $coordinates;

    /**
     * @var DeliveryAddress
     */
    private DeliveryAddress $address;

    /**
     * Constructor
     */
    public function __construct(
        DeliveryTimeSlot $timeSlot,
        DeliveryPrice $price,
        DeliveryCoordinates $coordinates,
        DeliveryAddress $address
    ) {
        $this->timeSlot = $timeSlot;
        $this->price = $price;
        $this->coordinates = $coordinates;
        $this->address = $address;
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
            DeliveryTimeSlot::fromArray($data['timeSlot']),
            DeliveryPrice::fromArray($data['price']),
            DeliveryCoordinates::fromArray($data['coordinates']),
            DeliveryAddress::fromArray($data['address'])
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
     * Gets price
     *
     * @return DeliveryPrice
     */
    public function getPrice(): DeliveryPrice
    {
        return $this->price;
    }

    /**
     * Gets coordinates
     *
     * @return DeliveryCoordinates
     */
    public function getCoordinates(): DeliveryCoordinates
    {
        return $this->coordinates;
    }

    /**
     * Gets address
     *
     * @return DeliveryAddress
     */
    public function getAddress(): DeliveryAddress
    {
        return $this->address;
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
            'price' => $this->price,
            'coordinates' => $this->coordinates,
            'address' => $this->address,
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
