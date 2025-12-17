<?php
/**
 * SkuCharacteristic - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * SkuCharacteristic - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class SkuCharacteristic implements \JsonSerializable
{
    /**
     * @var int
     */
    private int $characteristicId;

    /**
     * @var string
     */
    private string $characteristicValue;

    /**
     * Constructor
     */
    public function __construct(
        int $characteristicId,
        string $characteristicValue
    ) {
        $this->characteristicId = $characteristicId;
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
            $data['characteristicId'],
            $data['characteristicValue']
        );
    }

    /**
     * Gets characteristicId
     *
     * @return int
     */
    public function getCharacteristicId(): int
    {
        return $this->characteristicId;
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
            'characteristicId' => $this->characteristicId,
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
