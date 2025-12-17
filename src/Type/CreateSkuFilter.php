<?php
/**
 * CreateSkuFilter - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * CreateSkuFilter - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class CreateSkuFilter implements \JsonSerializable
{
    /**
     * @var int
     */
    private int $characteristicId;

    /**
     * @var SkuFilterValue[]
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
            isset($data['characteristicValues']) ? array_map(fn($item) => SkuFilterValue::fromArray($item),
                $data['characteristicValues']) : []
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
     * @return SkuFilterValue[]
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
            'characteristicValues' => array_map(fn($item) => $item->jsonSerialize(), $this->characteristicValues),
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
