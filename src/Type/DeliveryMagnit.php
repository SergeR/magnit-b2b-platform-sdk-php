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
    private $timeSlot;

    /**
     * @var DeliveryPrice
     */
    private $price;

    /**
     * @var DeliveryCoordinates
     */
    private $coordinates;

    /**
     * @var DeliveryAddress
     */
    private $address;

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
        if (isset($data['price'])) {
            $this->price = $data['price'];
        }
        if (isset($data['coordinates'])) {
            $this->coordinates = $data['coordinates'];
        }
        if (isset($data['address'])) {
            $this->address = $data['address'];
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
            DeliveryTimeSlot::fromArray($data['time_slot']),
            DeliveryPrice::fromArray($data['price']),
            DeliveryCoordinates::fromArray($data['coordinates']),
            DeliveryAddress::fromArray($data['address'])
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
     * Gets timeSlot
     *
     * @return DeliveryTimeSlot
     */
    public function getTimeSlot()
    {
        return $this->timeSlot;
    }

    /**
     * Gets price
     *
     * @return DeliveryPrice
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Gets coordinates
     *
     * @return DeliveryCoordinates
     */
    public function getCoordinates()
    {
        return $this->coordinates;
    }

    /**
     * Gets address
     *
     * @return DeliveryAddress
     */
    public function getAddress()
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
        $data = [];
        
        if (isset($this->timeSlot)) {
            $data['time_slot'] = $this->timeSlot;
        }
        if (isset($this->price)) {
            $data['price'] = $this->price;
        }
        if (isset($this->coordinates)) {
            $data['coordinates'] = $this->coordinates;
        }
        if (isset($this->address)) {
            $data['address'] = $this->address;
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
