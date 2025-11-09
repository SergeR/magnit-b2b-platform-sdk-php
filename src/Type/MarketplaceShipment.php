<?php
/**
 * MarketplaceShipment - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * MarketplaceShipment - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class MarketplaceShipment implements \JsonSerializable
{
    /**
     * @var string
     */
    private $shipmentId;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $confirmedAt;

    /**
     * @var MarketplaceShipmentStatus
     */
    private $status;

    /**
     * @var MarketplaceShipmentParcelsInner[]
     */
    private $parcels;

            /**
     * Constructor
     */
    public function __construct(
        string $shipmentId,
        \DateTime $createdAt,
        \DateTime $confirmedAt,
        MarketplaceShipmentStatus $status,
        MarketplaceShipmentParcelsInner[] $parcels
    ) {
        $this->shipmentId = $shipmentId;
        $this->createdAt = $createdAt;
        $this->confirmedAt = $confirmedAt;
        $this->status = $status;
        $this->parcels = $parcels;
    }
        if (isset($data['created_at'])) {
            $this->createdAt = $data['created_at'];
        }
        if (isset($data['confirmed_at'])) {
            $this->confirmedAt = $data['confirmed_at'];
        }
        if (isset($data['status'])) {
            $this->status = $data['status'];
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
            \DateTime::fromArray($data['created_at']),
            \DateTime::fromArray($data['confirmed_at']),
            MarketplaceShipmentStatus::fromArray($data['status']),
            isset($data['parcels']) ? array_map(fn($item) => MarketplaceShipmentParcelsInner::fromArray($item), $data['parcels']) : []
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
     * Gets createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Gets confirmedAt
     *
     * @return \DateTime
     */
    public function getConfirmedAt()
    {
        return $this->confirmedAt;
    }

    /**
     * Gets status
     *
     * @return MarketplaceShipmentStatus
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Gets parcels
     *
     * @return MarketplaceShipmentParcelsInner[]
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
        if (isset($this->createdAt)) {
            $data['created_at'] = $this->createdAt instanceof \JsonSerializable ? $this->createdAt->jsonSerialize() : $this->createdAt;
        }
        if (isset($this->confirmedAt)) {
            $data['confirmed_at'] = $this->confirmedAt instanceof \JsonSerializable ? $this->confirmedAt->jsonSerialize() : $this->confirmedAt;
        }
        if (isset($this->status)) {
            $data['status'] = $this->status;
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
