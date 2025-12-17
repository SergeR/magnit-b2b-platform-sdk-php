<?php
/**
 * SkuDimensions - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * SkuDimensions - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class SkuDimensions implements \JsonSerializable
{
    /**
     * @var int
     */
    private int $height;

    /**
     * @var int
     */
    private int $length;

    /**
     * @var int
     */
    private int $weight;

    /**
     * @var int
     */
    private int $width;

    /**
     * Constructor
     */
    public function __construct(
        int $height,
        int $length,
        int $weight,
        int $width
    ) {
        $this->height = $height;
        $this->length = $length;
        $this->weight = $weight;
        $this->width = $width;
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
            $data['height'],
            $data['length'],
            $data['weight'],
            $data['width']
        );
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
     * Gets length
     *
     * @return int
     */
    public function getLength(): int
    {
        return $this->length;
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
     * Gets width
     *
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'height' => $this->height,
            'length' => $this->length,
            'weight' => $this->weight,
            'width' => $this->width,
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
