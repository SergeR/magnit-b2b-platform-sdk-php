<?php
/**
 * MarketplaceParcelsListResponse - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * MarketplaceParcelsListResponse - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class MarketplaceParcelsListResponse implements \JsonSerializable
{
    /**
     * @var string
     */
    private string $nextPageToken;

    /**
     * @var MarketplaceParcelFullInfo[]
     */
    private array $parcels;

    /**
     * Constructor
     */
    public function __construct(
        string $nextPageToken,
        array $parcels
    ) {
        $this->nextPageToken = $nextPageToken;
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
            $data['nextPageToken'],
            isset($data['parcels']) ? array_map(fn($item) => MarketplaceParcelFullInfo::fromArray($item),
                $data['parcels']) : []
        );
    }

    /**
     * Gets nextPageToken
     *
     * @return string
     */
    public function getNextPageToken(): string
    {
        return $this->nextPageToken;
    }

    /**
     * Gets parcels
     *
     * @return MarketplaceParcelFullInfo[]
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
            'nextPageToken' => $this->nextPageToken,
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
