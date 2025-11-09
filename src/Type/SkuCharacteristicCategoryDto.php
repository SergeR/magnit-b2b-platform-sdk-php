<?php
/**
 * SkuCharacteristicCategoryDto - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * SkuCharacteristicCategoryDto - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class SkuCharacteristicCategoryDto implements \JsonSerializable
{
    /**
     * @var string
     */
    private $characteristicTitle;

    /**
     * @var int
     */
    private $dictionaryId;

    /**
     * @var bool
     */
    private $extendableValues;

    /**
     * @var string
     */
    private $inputType;

    /**
     * @var int
     */
    private $maxAllowedValues;

    /**
     * @var bool
     */
    private $required;

    /**
     * @var bool
     */
    private $systemCharacteristic;

    /**
     * @var string
     */
    private $type;

            /**
     * Constructor
     */
    public function __construct(
        string $characteristicTitle,
        int $dictionaryId,
        bool $extendableValues,
        string $inputType,
        int $maxAllowedValues,
        bool $required,
        bool $systemCharacteristic,
        string $type
    ) {
        $this->characteristicTitle = $characteristicTitle;
        $this->dictionaryId = $dictionaryId;
        $this->extendableValues = $extendableValues;
        $this->inputType = $inputType;
        $this->maxAllowedValues = $maxAllowedValues;
        $this->required = $required;
        $this->systemCharacteristic = $systemCharacteristic;
        $this->type = $type;
    }
        if (isset($data['dictionary_id'])) {
            $this->dictionaryId = $data['dictionary_id'];
        }
        if (isset($data['extendable_values'])) {
            $this->extendableValues = $data['extendable_values'];
        }
        if (isset($data['input_type'])) {
            $this->inputType = $data['input_type'];
        }
        if (isset($data['max_allowed_values'])) {
            $this->maxAllowedValues = $data['max_allowed_values'];
        }
        if (isset($data['required'])) {
            $this->required = $data['required'];
        }
        if (isset($data['system_characteristic'])) {
            $this->systemCharacteristic = $data['system_characteristic'];
        }
        if (isset($data['type'])) {
            $this->type = $data['type'];
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
            $data['characteristic_title'],
            $data['dictionary_id'],
            $data['extendable_values'],
            $data['input_type'],
            $data['max_allowed_values'],
            $data['required'],
            $data['system_characteristic'],
            $data['type']
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
     * Gets extendableValues
     *
     * @return bool
     */
    public function getExtendableValues()
    {
        return $this->extendableValues;
    }

    /**
     * Gets inputType
     *
     * @return string
     */
    public function getInputType()
    {
        return $this->inputType;
    }

    /**
     * Gets maxAllowedValues
     *
     * @return int
     */
    public function getMaxAllowedValues()
    {
        return $this->maxAllowedValues;
    }

    /**
     * Gets required
     *
     * @return bool
     */
    public function getRequired()
    {
        return $this->required;
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
     * Gets type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = [];
        
        if (isset($this->characteristicTitle)) {
            $data['characteristic_title'] = $this->characteristicTitle;
        }
        if (isset($this->dictionaryId)) {
            $data['dictionary_id'] = $this->dictionaryId;
        }
        if (isset($this->extendableValues)) {
            $data['extendable_values'] = $this->extendableValues;
        }
        if (isset($this->inputType)) {
            $data['input_type'] = $this->inputType;
        }
        if (isset($this->maxAllowedValues)) {
            $data['max_allowed_values'] = $this->maxAllowedValues;
        }
        if (isset($this->required)) {
            $data['required'] = $this->required;
        }
        if (isset($this->systemCharacteristic)) {
            $data['system_characteristic'] = $this->systemCharacteristic;
        }
        if (isset($this->type)) {
            $data['type'] = $this->type;
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
