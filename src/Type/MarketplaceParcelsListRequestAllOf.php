<?php
/**
 * MarketplaceParcelsListRequestAllOf - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * MarketplaceParcelsListRequestAllOf - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class MarketplaceParcelsListRequestAllOf implements \JsonSerializable
{
    /**
     * @var MarketplaceSortDirection
     */
    private MarketplaceSortDirection $dir;

    /**
     * @var string[]
     */
    private array $parcelId;

    /**
     * @var string[]
     */
    private array $orderId;

    /**
     * @var MarketplaceFilterDateTime
     */
    private MarketplaceFilterDateTime $createdAt;

    /**
     * @var MarketplaceFilterDateTime
     */
    private MarketplaceFilterDateTime $cutoffTime;

    /**
     * @var MarketplaceParcelStatus
     */
    private MarketplaceParcelStatus $status;

    /**
     * Constructor
     */
    public function __construct(
        MarketplaceSortDirection $dir,
        array $parcelId,
        array $orderId,
        MarketplaceFilterDateTime $createdAt,
        MarketplaceFilterDateTime $cutoffTime,
        MarketplaceParcelStatus $status
    ) {
        $this->dir = $dir;
        $this->parcelId = $parcelId;
        $this->orderId = $orderId;
        $this->createdAt = $createdAt;
        $this->cutoffTime = $cutoffTime;
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
            $data['parcelId'],
            $data['orderId'],
            MarketplaceFilterDateTime::fromArray($data['createdAt']),
            MarketplaceFilterDateTime::fromArray($data['cutoffTime']),
            MarketplaceParcelStatus::fromArray($data['status'])
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
     * Gets parcelId
     *
     * @return string[]
     */
    public function getParcelId(): array
    {
        return $this->parcelId;
    }

    /**
     * Gets orderId
     *
     * @return string[]
     */
    public function getOrderId(): array
    {
        return $this->orderId;
    }

    /**
     * Gets createdAt
     *
     * @return MarketplaceFilterDateTime
     */
    public function getCreatedAt(): MarketplaceFilterDateTime
    {
        return $this->createdAt;
    }

    /**
     * Gets cutoffTime
     *
     * @return MarketplaceFilterDateTime
     */
    public function getCutoffTime(): MarketplaceFilterDateTime
    {
        return $this->cutoffTime;
    }

    /**
     * Gets status
     *
     * @return MarketplaceParcelStatus
     */
    public function getStatus(): MarketplaceParcelStatus
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
            'parcelId' => $this->parcelId,
            'orderId' => $this->orderId,
            'createdAt' => $this->createdAt,
            'cutoffTime' => $this->cutoffTime,
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
