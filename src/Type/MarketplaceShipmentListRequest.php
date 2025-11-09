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
    private $pageSize;

    /**
     * @var string
     */
    private $pageToken;

    /**
     * @var MarketplaceSortDirection
     */
    private $dir;

    /**
     * @var string[]
     */
    private $shipmentId;

    /**
     * @var MarketplaceFilterDateTime
     */
    private $confirmedAt;

    /**
     * @var MarketplaceShipmentStatus
     */
    private $status;

            /**
     * Constructor
     */
    public function __construct(
        int $pageSize,
        string $pageToken,
        MarketplaceSortDirection $dir,
        string[] $shipmentId,
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
        if (isset($data['page_token'])) {
            $this->pageToken = $data['page_token'];
        }
        if (isset($data['dir'])) {
            $this->dir = $data['dir'];
        }
        if (isset($data['shipment_id'])) {
            $this->shipmentId = $data['shipment_id'];
        }
        if (isset($data['confirmed_at'])) {
            $this->confirmedAt = $data['confirmed_at'];
        }
        if (isset($data['status'])) {
            $this->status = $data['status'];
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
            $data['page_size'],
            $data['page_token'],
            MarketplaceSortDirection::fromArray($data['dir']),
            $data['shipment_id'],
            MarketplaceFilterDateTime::fromArray($data['confirmed_at']),
            MarketplaceShipmentStatus::fromArray($data['status'])
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
     * Gets pageSize
     *
     * @return int
     */
    public function getPageSize()
    {
        return $this->pageSize;
    }

    /**
     * Gets pageToken
     *
     * @return string
     */
    public function getPageToken()
    {
        return $this->pageToken;
    }

    /**
     * Gets dir
     *
     * @return MarketplaceSortDirection
     */
    public function getDir()
    {
        return $this->dir;
    }

    /**
     * Gets shipmentId
     *
     * @return string[]
     */
    public function getShipmentId()
    {
        return $this->shipmentId;
    }

    /**
     * Gets confirmedAt
     *
     * @return MarketplaceFilterDateTime
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
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = [];
        
        if (isset($this->pageSize)) {
            $data['page_size'] = $this->pageSize;
        }
        if (isset($this->pageToken)) {
            $data['page_token'] = $this->pageToken;
        }
        if (isset($this->dir)) {
            $data['dir'] = $this->dir;
        }
        if (isset($this->shipmentId)) {
            $data['shipment_id'] = array_map(function($item) {
                return $item instanceof \JsonSerializable ? $item->jsonSerialize() : $item;
            }, $this->shipmentId);
        }
        if (isset($this->confirmedAt)) {
            $data['confirmed_at'] = $this->confirmedAt;
        }
        if (isset($this->status)) {
            $data['status'] = $this->status;
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
