<?php
/**
 * MarketplaceShipmentListRequestAllOf - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * MarketplaceShipmentListRequestAllOf - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class MarketplaceShipmentListRequestAllOf implements \JsonSerializable
{
    /**
     * @var MarketplaceSortDirection
     */
    private MarketplaceSortDirection $dir;

    /**
     * @var string[]
     */
    private array $shipmentId;

    /**
     * @var MarketplaceFilterDateTime
     */
    private MarketplaceFilterDateTime $confirmedAt;

    /**
     * @var MarketplaceShipmentStatus
     */
    private MarketplaceShipmentStatus $status;

    /**
     * Constructor
     */
    public function __construct(
        MarketplaceSortDirection $dir,
        array $shipmentId,
        MarketplaceFilterDateTime $confirmedAt,
        MarketplaceShipmentStatus $status
    ) {
        $this->dir = $dir;
        $this->shipmentId = $shipmentId;
        $this->confirmedAt = $confirmedAt;
        $this->status = $status;
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
            MarketplaceSortDirection::fromArray($data['dir']),
            $data['shipmentId'],
            MarketplaceFilterDateTime::fromArray($data['confirmedAt']),
            MarketplaceShipmentStatus::fromArray($data['status'])
        );
    }

    /**
     * Gets dir
     *
     * @return MarketplaceSortDirection
     */
    public function getDir(): MarketplaceSortDirection
    {
        return $this->dir;
    }

    /**
     * Gets shipmentId
     *
     * @return string[]
     */
    public function getShipmentId(): array
    {
        return $this->shipmentId;
    }

    /**
     * Gets confirmedAt
     *
     * @return MarketplaceFilterDateTime
     */
    public function getConfirmedAt(): MarketplaceFilterDateTime
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
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'dir' => $this->dir,
            'shipmentId' => $this->shipmentId,
            'confirmedAt' => $this->confirmedAt,
            'status' => $this->status,
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
