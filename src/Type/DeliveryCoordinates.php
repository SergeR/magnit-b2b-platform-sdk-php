<?php
/**
 * DeliveryCoordinates - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * DeliveryCoordinates - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class DeliveryCoordinates implements \JsonSerializable
{
    /**
     * @var float
     */
    private float $lat;

    /**
     * @var float
     */
    private float $lng;

    /**
     * Constructor
     */
    public function __construct(
        float $lat,
        float $lng
    ) {
        $this->lat = $lat;
        $this->lng = $lng;
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
            $data['lat'],
            $data['lng']
        );
    }

    /**
     * Gets lat
     *
     * @return float
     */
    public function getLat(): float
    {
        return $this->lat;
    }

    /**
     * Gets lng
     *
     * @return float
     */
    public function getLng(): float
    {
        return $this->lng;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'lat' => $this->lat,
            'lng' => $this->lng,
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
