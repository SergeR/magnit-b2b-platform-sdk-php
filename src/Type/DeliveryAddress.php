<?php
/**
 * DeliveryAddress - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * DeliveryAddress - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class DeliveryAddress implements \JsonSerializable
{
    /**
     * @var string
     */
    private string $city;

    /**
     * @var string
     */
    private string $street;

    /**
     * @var string
     */
    private string $building;

    /**
     * @var string
     */
    private string $entrance;

    /**
     * @var string
     */
    private string $floor;

    /**
     * @var string
     */
    private string $flat;

    /**
     * @var string
     */
    private string $intercom;

    /**
     * @var string
     */
    private string $full;

    /**
     * Constructor
     */
    public function __construct(
        string $city,
        string $street,
        string $building,
        string $entrance,
        string $floor,
        string $flat,
        string $intercom,
        string $full
    ) {
        $this->city = $city;
        $this->street = $street;
        $this->building = $building;
        $this->entrance = $entrance;
        $this->floor = $floor;
        $this->flat = $flat;
        $this->intercom = $intercom;
        $this->full = $full;
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
            $data['city'],
            $data['street'],
            $data['building'],
            $data['entrance'],
            $data['floor'],
            $data['flat'],
            $data['intercom'],
            $data['full']
        );
    }

    /**
     * Gets city
     *
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * Gets street
     *
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * Gets building
     *
     * @return string
     */
    public function getBuilding(): string
    {
        return $this->building;
    }

    /**
     * Gets entrance
     *
     * @return string
     */
    public function getEntrance(): string
    {
        return $this->entrance;
    }

    /**
     * Gets floor
     *
     * @return string
     */
    public function getFloor(): string
    {
        return $this->floor;
    }

    /**
     * Gets flat
     *
     * @return string
     */
    public function getFlat(): string
    {
        return $this->flat;
    }

    /**
     * Gets intercom
     *
     * @return string
     */
    public function getIntercom(): string
    {
        return $this->intercom;
    }

    /**
     * Gets full
     *
     * @return string
     */
    public function getFull(): string
    {
        return $this->full;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'city' => $this->city,
            'street' => $this->street,
            'building' => $this->building,
            'entrance' => $this->entrance,
            'floor' => $this->floor,
            'flat' => $this->flat,
            'intercom' => $this->intercom,
            'full' => $this->full,
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
