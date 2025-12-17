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
    private string $parcelId;

    /**
     * @var MarketplaceParcelItem[]
     */
    private array $items;

    /**
     * Constructor
     */
    public function __construct(
        string $parcelId,
        array $items
    ) {
        $this->parcelId = $parcelId;
        $this->items = $items;
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
            $data['parcelId'],
            isset($data['items']) ? array_map(fn($item) => MarketplaceParcelItem::fromArray($item), $data['items']) : []
        );
    }

    /**
     * Gets parcelId
     *
     * @return string
     */
    public function getParcelId(): string
    {
        return $this->parcelId;
    }

    /**
     * Gets items
     *
     * @return MarketplaceParcelItem[]
     */
    public function getItems(): array
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
        return [
            'parcelId' => $this->parcelId,
            'items' => array_map(fn($item) => $item->jsonSerialize(), $this->items),
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
