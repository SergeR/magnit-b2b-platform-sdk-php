<?php
/**
 * DictionaryResponse - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * DictionaryResponse - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class DictionaryResponse implements \JsonSerializable
{
    /**
     * @var CharacteristicAttribute[]
     */
    private $characteristicAttributes;

    /**
     * @var string
     */
    private $characteristicTitle;

    /**
     * @var int
     */
    private $dictionaryId;

    /**
     * @var DictionaryPagination
     */
    private $pagination;

    /**
     * @var bool
     */
    private $systemCharacteristic;

            /**
     * Constructor
     */
    public function __construct(
        CharacteristicAttribute[] $characteristicAttributes,
        string $characteristicTitle,
        int $dictionaryId,
        DictionaryPagination $pagination,
        bool $systemCharacteristic
    ) {
        $this->characteristicAttributes = $characteristicAttributes;
        $this->characteristicTitle = $characteristicTitle;
        $this->dictionaryId = $dictionaryId;
        $this->pagination = $pagination;
        $this->systemCharacteristic = $systemCharacteristic;
    }
        if (isset($data['characteristic_title'])) {
            $this->characteristicTitle = $data['characteristic_title'];
        }
        if (isset($data['dictionary_id'])) {
            $this->dictionaryId = $data['dictionary_id'];
        }
        if (isset($data['pagination'])) {
            $this->pagination = $data['pagination'];
        }
        if (isset($data['system_characteristic'])) {
            $this->systemCharacteristic = $data['system_characteristic'];
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
            isset($data['characteristic_attributes']) ? array_map(fn($item) => CharacteristicAttribute::fromArray($item), $data['characteristic_attributes']) : [],
            $data['characteristic_title'],
            $data['dictionary_id'],
            DictionaryPagination::fromArray($data['pagination']),
            $data['system_characteristic']
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
     * Gets characteristicAttributes
     *
     * @return CharacteristicAttribute[]
     */
    public function getCharacteristicAttributes()
    {
        return $this->characteristicAttributes;
    }

    /**
     * Gets characteristicTitle
     *
     * @return string
     */
    public function getCharacteristicTitle()
    {
        return $this->characteristicTitle;
    }

    /**
     * Gets dictionaryId
     *
     * @return int
     */
    public function getDictionaryId()
    {
        return $this->dictionaryId;
    }

    /**
     * Gets pagination
     *
     * @return DictionaryPagination
     */
    public function getPagination()
    {
        return $this->pagination;
    }

    /**
     * Gets systemCharacteristic
     *
     * @return bool
     */
    public function getSystemCharacteristic()
    {
        return $this->systemCharacteristic;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = [];
        
        if (isset($this->characteristicAttributes)) {
            $data['characteristic_attributes'] = array_map(function($item) {
                return $item instanceof \JsonSerializable ? $item->jsonSerialize() : $item;
            }, $this->characteristicAttributes);
        }
        if (isset($this->characteristicTitle)) {
            $data['characteristic_title'] = $this->characteristicTitle;
        }
        if (isset($this->dictionaryId)) {
            $data['dictionary_id'] = $this->dictionaryId;
        }
        if (isset($this->pagination)) {
            $data['pagination'] = $this->pagination;
        }
        if (isset($this->systemCharacteristic)) {
            $data['system_characteristic'] = $this->systemCharacteristic;
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
