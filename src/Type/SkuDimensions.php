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
    private $height;

    /**
     * @var int
     */
    private $length;

    /**
     * @var int
     */
    private $weight;

    /**
     * @var int
     */
    private $width;

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
        if (isset($data['length'])) {
            $this->length = $data['length'];
        }
        if (isset($data['weight'])) {
            $this->weight = $data['weight'];
        }
        if (isset($data['width'])) {
            $this->width = $data['width'];
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
            $data['height'],
            $data['length'],
            $data['weight'],
            $data['width']
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
     * Gets height
     *
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Gets length
     *
     * @return int
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Gets weight
     *
     * @return int
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Gets width
     *
     * @return int
     */
    public function getWidth()
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
        $data = [];
        
        if (isset($this->height)) {
            $data['height'] = $this->height;
        }
        if (isset($this->length)) {
            $data['length'] = $this->length;
        }
        if (isset($this->weight)) {
            $data['weight'] = $this->weight;
        }
        if (isset($this->width)) {
            $data['width'] = $this->width;
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
