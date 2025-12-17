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
    private string $fileContent;

    /**
     * @var MarketplaceParcelLabelItem[]
     */
    private array $parcels;

    /**
     * Constructor
     */
    public function __construct(
        string $fileContent,
        array $parcels
    ) {
        $this->fileContent = $fileContent;
        $this->parcels = $parcels;
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
            $data['fileContent'],
            isset($data['parcels']) ? array_map(fn($item) => MarketplaceParcelLabelItem::fromArray($item), $data['parcels']) : []
        );
    }

    /**
     * Gets fileContent
     *
     * @return string
     */
    public function getFileContent(): string
    {
        return $this->fileContent;
    }

    /**
     * Gets parcels
     *
     * @return MarketplaceParcelLabelItem[]
     */
    public function getParcels(): array
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
        return [
            'fileContent' => $this->fileContent,
            'parcels' => array_map(fn($item) => $item->jsonSerialize(), $this->parcels),
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
