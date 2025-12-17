<?php
/**
 * MarketplaceShipmentListRequest - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * MarketplaceShipmentListRequest - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class MarketplaceShipmentListRequest implements \JsonSerializable
{
    /**
     * @var int
     */
    private int $pageSize;

    /**
     * @var string
     */
    private string $pageToken;

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
        int $pageSize,
        string $pageToken,
        MarketplaceSortDirection $dir,
        array $shipmentId,
        MarketplaceFilterDateTime $confirmedAt,
        MarketplaceShipmentStatus $status
    ) {
        $this->pageSize = $pageSize;
        $this->pageToken = $pageToken;
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
            $data['pageSize'],
            $data['pageToken'],
            MarketplaceSortDirection::fromArray($data['dir']),
            $data['shipmentId'],
            MarketplaceFilterDateTime::fromArray($data['confirmedAt']),
            MarketplaceShipmentStatus::fromArray($data['status'])
        );
    }

    /**
     * Gets pageSize
     *
     * @return int
     */
    public function getPageSize(): int
    {
        return $this->pageSize;
    }

    /**
     * Gets pageToken
     *
     * @return string
     */
    public function getPageToken(): string
    {
        return $this->pageToken;
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
     * Пре��бразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'pageSize' => $this->pageSize,
            'pageToken' => $this->pageToken,
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
