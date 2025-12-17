<?php
/**
 * MarketplaceShipmentListResponseAllOf - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * MarketplaceShipmentListResponseAllOf - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class MarketplaceShipmentListResponseAllOf implements \JsonSerializable
{
    /**
     * @var MarketplaceShipment[]
     */
    private array $shipments;

    /**
     * Constructor
     */
    public function __construct(
        array $shipments
    ) {
        $this->shipments = $shipments;
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
            isset($data['shipments']) ? array_map(fn($item) => MarketplaceShipment::fromArray($item),
                $data['shipments']) : []
        );
    }

    /**
     * Gets shipments
     *
     * @return MarketplaceShipment[]
     */
    public function getShipments(): array
    {
        return $this->shipments;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'shipments' => array_map(fn($item) => $item->jsonSerialize(), $this->shipments),
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
