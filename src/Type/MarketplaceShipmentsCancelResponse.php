<?php
/**
 * MarketplaceShipmentsCancelResponse - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * MarketplaceShipmentsCancelResponse - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class MarketplaceShipmentsCancelResponse implements \JsonSerializable
{
    /**
     * @var string
     */
    private $shipmentId;

    /**
     * @var MarketplaceShipmentParcel[]
     */
    private $parcels;

            /**
     * Constructor
     */
    public function __construct(
        string $shipmentId,
        MarketplaceShipmentParcel[] $parcels
    ) {
        $this->shipmentId = $shipmentId;
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
            $data['shipment_id'],
            isset($data['parcels']) ? array_map(fn($item) => MarketplaceShipmentParcel::fromArray($item), $data['parcels']) : []
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
     * Gets shipmentId
     *
     * @return string
     */
    public function getShipmentId()
    {
        return $this->shipmentId;
    }

    /**
     * Gets parcels
     *
     * @return MarketplaceShipmentParcel[]
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
        
        if (isset($this->shipmentId)) {
            $data['shipment_id'] = $this->shipmentId;
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
