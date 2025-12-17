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
    private string $shipmentId;

    /**
     * @var \DateTime
     */
    private \DateTime $createdAt;

    /**
     * @var \DateTime
     */
    private \DateTime $confirmedAt;

    /**
     * @var MarketplaceShipmentStatus
     */
    private MarketplaceShipmentStatus $status;

    /**
     * @var MarketplaceShipmentParcelsInner[]
     */
    private array $parcels;

    /**
     * Constructor
     */
    public function __construct(
        string $shipmentId,
        \DateTime $createdAt,
        \DateTime $confirmedAt,
        MarketplaceShipmentStatus $status,
        array $parcels
    ) {
        $this->shipmentId = $shipmentId;
        $this->createdAt = $createdAt;
        $this->confirmedAt = $confirmedAt;
        $this->status = $status;
        $this->parcels = $parcels;
    }

    /**
     * Создать из массива
     *
     * @param array $data
     * @return self
     * @throws \Exception
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['shipmentId'],
            new \DateTime($data['createdAt']),
            new \DateTime($data['confirmedAt']),
            MarketplaceShipmentStatus::fromArray($data['status']),
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
     * Gets createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * Gets confirmedAt
     *
     * @return \DateTime
     */
    public function getConfirmedAt(): \DateTime
    {
        return $this->confirmedAt;
    }

    /**
     * Gets status
     *
     * @return MarketplaceShipmentStatus
     */
    public function getStatus(): MarketplaceShipmentStatus
    {
        return $this->status;
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
            'createdAt' => $this->createdAt->format(\DateTimeInterface::ATOM),
            'confirmedAt' => $this->confirmedAt->format(\DateTimeInterface::ATOM),
            'status' => $this->status,
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
