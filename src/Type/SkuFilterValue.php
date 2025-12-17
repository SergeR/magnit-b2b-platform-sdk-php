<?php
/**
 * SkuFilterValue - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * SkuFilterValue - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class SkuFilterValue implements \JsonSerializable
{
    /**
     * @var string
     */
    private string $characteristicValue;

    /**
     * Constructor
     */
    public function __construct(
        string $characteristicValue
    ) {
        $this->characteristicValue = $characteristicValue;
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
            $data['characteristicValue']
        );
    }

    /**
     * Gets characteristicValue
     *
     * @return string
     */
    public function getCharacteristicValue(): string
    {
        return $this->characteristicValue;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'characteristicValue' => $this->characteristicValue,
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
