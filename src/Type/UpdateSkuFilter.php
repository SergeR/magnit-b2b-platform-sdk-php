<?php
/**
 * UpdateSkuFilter - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * UpdateSkuFilter - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class UpdateSkuFilter implements \JsonSerializable
{
    /**
     * @var int
     */
    private int $characteristicId;

    /**
     * @var string[]
     */
    private array $characteristicValues;

    /**
     * Constructor
     */
    public function __construct(
        int $characteristicId,
        array $characteristicValues
    ) {
        $this->characteristicId = $characteristicId;
        $this->characteristicValues = $characteristicValues;
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
            $data['characteristicValues']
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
     * Gets characteristicValues
     *
     * @return string[]
     */
    public function getCharacteristicValues(): array
    {
        return $this->characteristicValues;
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
            'characteristicValues' => $this->characteristicValues,
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
