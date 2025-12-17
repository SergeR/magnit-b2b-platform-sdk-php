<?php
/**
 * MarketplaceOrderCompleteResponse - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * MarketplaceOrderCompleteResponse - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class MarketplaceOrderCompleteResponse implements \JsonSerializable
{
    /**
     * @var MarketplaceParcel[]
     */
    private array $parcels;

    /**
     * Constructor
     */
    public function __construct(
        array $parcels
    ) {
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
            isset($data['parcels']) ? array_map(fn($item) => MarketplaceParcel::fromArray($item), $data['parcels']) : []
        );
    }

    /**
     * Gets parcels
     *
     * @return MarketplaceParcel[]
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
