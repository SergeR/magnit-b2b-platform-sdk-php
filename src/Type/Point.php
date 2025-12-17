<?php
/**
 * Point - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * Point - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class Point implements \JsonSerializable
{
    /**
     * @var float
     */
    private float $lat;

    /**
     * @var float
     */
    private float $lon;

    /**
     * Constructor
     */
    public function __construct(
        float $lat,
        float $lon
    ) {
        $this->lat = $lat;
        $this->lon = $lon;
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
            $data['lon']
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
     * Gets lon
     *
     * @return float
     */
    public function getLon(): float
    {
        return $this->lon;
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
            'lon' => $this->lon,
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
