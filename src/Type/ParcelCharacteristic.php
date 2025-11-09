<?php
/**
 * ParcelCharacteristic - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * ParcelCharacteristic - Характеристики посылки
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class ParcelCharacteristic implements \JsonSerializable
{
    private int $weight;
    private int $length;
    private int $width;
    private int $height;

    /**
     * Constructor
     *
     * @param int $weight Вес (граммы)
     * @param int $length Длина (мм)
     * @param int $width Ширина (мм)
     * @param int $height Высота (мм)
     */
    public function __construct(int $weight, int $length, int $width, int $height)
    {
        $this->weight = $weight;
        $this->length = $length;
        $this->width = $width;
        $this->height = $height;
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
            $data['weight'],
            $data['length'],
            $data['width'],
            $data['height']
        );
    }

    /**
     * Gets weight
     *
     * @return int
     */
    public function getWeight(): int
    {
        return $this->weight;
    }

    /**
     * Gets length
     *
     * @return int
     */
    public function getLength(): int
    {
        return $this->length;
    }

    /**
     * Gets width
     *
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * Gets height
     *
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'weight' => $this->weight,
            'length' => $this->length,
            'width' => $this->width,
            'height' => $this->height,
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
