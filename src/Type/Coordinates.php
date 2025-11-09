<?php
/**
 * Coordinates - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

declare(strict_types=1);

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * Coordinates - Координаты
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class Coordinates implements \JsonSerializable
{
    private float $lat;
    private float $lon;

    /**
     * Constructor
     *
     * @param float $lat Широта
     * @param float $lon Долгота
     */
    public function __construct(float $lat, float $lon)
    {
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
        return new self($data['lat'], $data['lon']);
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
