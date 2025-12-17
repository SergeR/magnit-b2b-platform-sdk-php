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
    private array $characteristicAttributes;

    /**
     * @var string
     */
    private string $characteristicTitle;

    /**
     * @var int
     */
    private int $dictionaryId;

    /**
     * @var DictionaryPagination
     */
    private DictionaryPagination $pagination;

    /**
     * @var bool
     */
    private bool $systemCharacteristic;

    /**
     * Constructor
     */
    public function __construct(
        array $characteristicAttributes,
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

    /**
     * Создать из массива
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self(
            isset($data['characteristicAttributes']) ? array_map(
                fn($item) => CharacteristicAttribute::fromArray($item),
                $data['characteristicAttributes']
            ) : [],
            $data['characteristicTitle'],
            $data['dictionaryId'],
            DictionaryPagination::fromArray($data['pagination']),
            $data['systemCharacteristic']
        );
    }

    /**
     * Gets characteristicAttributes
     *
     * @return CharacteristicAttribute[]
     */
    public function getCharacteristicAttributes(): array
    {
        return $this->characteristicAttributes;
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
     * Gets pagination
     *
     * @return DictionaryPagination
     */
    public function getPagination(): DictionaryPagination
    {
        return $this->pagination;
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
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'characteristicAttributes' => array_map(fn($item) => $item->jsonSerialize(), $this->characteristicAttributes),
            'characteristicTitle' => $this->characteristicTitle,
            'dictionaryId' => $this->dictionaryId,
            'pagination' => $this->pagination,
            'systemCharacteristic' => $this->systemCharacteristic,
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
