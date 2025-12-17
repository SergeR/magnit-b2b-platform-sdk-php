<?php
/**
 * MarketplaceShipmentAddParcelsResponse - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * MarketplaceShipmentAddParcelsResponse - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class MarketplaceShipmentAddParcelsResponse implements \JsonSerializable
{
    /**
     * @var string
     */
    private string $shipmentId;

    /**
     * @var MarketplaceShipmentParcelsInner[]
     */
    private array $parcels;

    /**
     * Constructor
     */
    public function __construct(
        string $shipmentId,
        array $parcels
    ) {
        $this->shipmentId = $shipmentId;
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
            $data['shipmentId'],
            isset($data['parcels']) ? array_map(fn($item) => MarketplaceShipmentParcelsInner::fromArray($item),
                $data['parcels']) : []
        );
    }

    /**
     * Gets shipmentId
     *
     * @return string
     */
    public function getShipmentId(): string
    {
        return $this->shipmentId;
    }

    /**
     * Gets parcels
     *
     * @return MarketplaceShipmentParcelsInner[]
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
            'shipmentId' => $this->shipmentId,
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
