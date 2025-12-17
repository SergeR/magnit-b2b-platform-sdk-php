<?php
/**
 * CustomSkuCharacteristic - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * CustomSkuCharacteristic - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class CustomSkuCharacteristic implements \JsonSerializable
{
    /**
     * @var string
     */
    private string $characteristicTitle;

    /**
     * @var string
     */
    private string $characteristicValue;

    /**
     * Constructor
     */
    public function __construct(
        string $characteristicTitle,
        string $characteristicValue
    ) {
        $this->characteristicTitle = $characteristicTitle;
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
            $data['characteristicTitle'],
            $data['characteristicValue']
        );
    }

    /**
     * Gets characteristicTitle
     *
     * @return string
     */
    public function getCharacteristicTitle(): string
    {
        return $this->characteristicTitle;
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
            'characteristicTitle' => $this->characteristicTitle,
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
