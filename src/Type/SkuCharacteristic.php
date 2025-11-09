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
    private $characteristicId;

    /**
     * @var string
     */
    private $characteristicValue;

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
        if (isset($data['characteristic_value'])) {
            $this->characteristicValue = $data['characteristic_value'];
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
            $data['characteristic_value']
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
     * Gets characteristicValue
     *
     * @return string
     */
    public function getCharacteristicValue()
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
        $data = [];
        
        if (isset($this->characteristicId)) {
            $data['characteristic_id'] = $this->characteristicId;
        }
        if (isset($this->characteristicValue)) {
            $data['characteristic_value'] = $this->characteristicValue;
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
