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
    private $characteristicId;

    /**
     * @var string[]
     */
    private $characteristicValues;

            /**
     * Constructor
     */
    public function __construct(
        int $characteristicId,
        string[] $characteristicValues
    ) {
        $this->characteristicId = $characteristicId;
        $this->characteristicValues = $characteristicValues;
    }
        if (isset($data['characteristic_values'])) {
            $this->characteristicValues = $data['characteristic_values'];
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
            $data['characteristic_id'],
            $data['characteristic_values']
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
     * Gets characteristicId
     *
     * @return int
     */
    public function getCharacteristicId()
    {
        return $this->characteristicId;
    }

    /**
     * Gets characteristicValues
     *
     * @return string[]
     */
    public function getCharacteristicValues()
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
        $data = [];
        
        if (isset($this->characteristicId)) {
            $data['characteristic_id'] = $this->characteristicId;
        }
        if (isset($this->characteristicValues)) {
            $data['characteristic_values'] = array_map(function($item) {
                return $item instanceof \JsonSerializable ? $item->jsonSerialize() : $item;
            }, $this->characteristicValues);
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
