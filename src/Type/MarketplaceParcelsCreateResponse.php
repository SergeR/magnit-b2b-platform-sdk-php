<?php
/**
 * MarketplaceParcelsCreateResponse - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * MarketplaceParcelsCreateResponse - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class MarketplaceParcelsCreateResponse implements \JsonSerializable
{
    /**
     * @var string
     */
    private $parcelId;

    /**
     * @var MarketplaceParcelItem[]
     */
    private $items;

            /**
     * Constructor
     */
    public function __construct(
        string $parcelId,
        MarketplaceParcelItem[] $items
    ) {
        $this->parcelId = $parcelId;
        $this->items = $items;
    }
        if (isset($data['items'])) {
            $this->items = $data['items'];
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
            $data['parcel_id'],
            isset($data['items']) ? array_map(fn($item) => MarketplaceParcelItem::fromArray($item), $data['items']) : []
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
     * Gets parcelId
     *
     * @return string
     */
    public function getParcelId()
    {
        return $this->parcelId;
    }

    /**
     * Gets items
     *
     * @return MarketplaceParcelItem[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = [];
        
        if (isset($this->parcelId)) {
            $data['parcel_id'] = $this->parcelId;
        }
        if (isset($this->items)) {
            $data['items'] = array_map(function($item) {
                return $item instanceof \JsonSerializable ? $item->jsonSerialize() : $item;
            }, $this->items);
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
