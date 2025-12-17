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
    private string $characteristicTitle;

    /**
     * @var int
     */
    private int $dictionaryId;

    /**
     * @var bool
     */
    private bool $extendableValues;

    /**
     * @var string
     */
    private string $inputType;

    /**
     * @var int
     */
    private int $maxAllowedValues;

    /**
     * @var bool
     */
    private bool $required;

    /**
     * @var bool
     */
    private bool $systemCharacteristic;

    /**
     * @var string
     */
    private string $type;

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
            $data['dictionaryId'],
            $data['extendableValues'],
            $data['inputType'],
            $data['maxAllowedValues'],
            $data['required'],
            $data['systemCharacteristic'],
            $data['type']
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
     * Gets dictionaryId
     *
     * @return int
     */
    public function getDictionaryId(): int
    {
        return $this->dictionaryId;
    }

    /**
     * Gets extendableValues
     *
     * @return bool
     */
    public function getExtendableValues(): bool
    {
        return $this->extendableValues;
    }

    /**
     * Gets inputType
     *
     * @return string
     */
    public function getInputType(): string
    {
        return $this->inputType;
    }

    /**
     * Gets maxAllowedValues
     *
     * @return int
     */
    public function getMaxAllowedValues(): int
    {
        return $this->maxAllowedValues;
    }

    /**
     * Gets required
     *
     * @return bool
     */
    public function getRequired(): bool
    {
        return $this->required;
    }

    /**
     * Gets systemCharacteristic
     *
     * @return bool
     */
    public function getSystemCharacteristic(): bool
    {
        return $this->systemCharacteristic;
    }

    /**
     * Gets type
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Преобр��зовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'characteristicTitle' => $this->characteristicTitle,
            'dictionaryId' => $this->dictionaryId,
            'extendableValues' => $this->extendableValues,
            'inputType' => $this->inputType,
            'maxAllowedValues' => $this->maxAllowedValues,
            'required' => $this->required,
            'systemCharacteristic' => $this->systemCharacteristic,
            'type' => $this->type,
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
