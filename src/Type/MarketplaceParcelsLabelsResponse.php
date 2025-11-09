<?php
/**
 * MarketplaceParcelsLabelsResponse - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * MarketplaceParcelsLabelsResponse - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class MarketplaceParcelsLabelsResponse implements \JsonSerializable
{
    /**
     * @var string
     */
    private $fileContent;

    /**
     * @var MarketplaceParcelLabelItem[]
     */
    private $parcels;

            /**
     * Constructor
     */
    public function __construct(
        string $fileContent,
        MarketplaceParcelLabelItem[] $parcels
    ) {
        $this->fileContent = $fileContent;
        $this->parcels = $parcels;
    }
        if (isset($data['parcels'])) {
            $this->parcels = $data['parcels'];
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
            $data['file_content'],
            isset($data['parcels']) ? array_map(fn($item) => MarketplaceParcelLabelItem::fromArray($item), $data['parcels']) : []
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
     * Gets fileContent
     *
     * @return string
     */
    public function getFileContent()
    {
        return $this->fileContent;
    }

    /**
     * Gets parcels
     *
     * @return MarketplaceParcelLabelItem[]
     */
    public function getParcels()
    {
        return $this->parcels;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = [];
        
        if (isset($this->fileContent)) {
            $data['file_content'] = $this->fileContent;
        }
        if (isset($this->parcels)) {
            $data['parcels'] = array_map(function($item) {
                return $item instanceof \JsonSerializable ? $item->jsonSerialize() : $item;
            }, $this->parcels);
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
