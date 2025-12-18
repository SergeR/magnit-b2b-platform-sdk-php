<?php
/**
 * MarketplaceOrdersListRequest - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * MarketplaceOrdersListRequest - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class MarketplaceOrdersListRequest implements \JsonSerializable
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
    private array $orderId;

    /**
     * @var MarketplaceFilterDateTime
     */
    private MarketplaceFilterDateTime $createdAt;

    /**
     * @var string Статус сборочного задания: 'NEW', 'IN_ASSEMBLY', 'ASSEMBLED', 'CANCELED'
     */
    private string $status;

    /**
     * Constructor
     */
    public function __construct(
        int $pageSize,
        string $pageToken,
        MarketplaceSortDirection $dir,
        array $orderId,
        MarketplaceFilterDateTime $createdAt,
        string $status
    ) {
        $this->pageSize = $pageSize;
        $this->pageToken = $pageToken;
        $this->dir = $dir;
        $this->orderId = $orderId;
        $this->createdAt = $createdAt;
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
            $data['orderId'],
            MarketplaceFilterDateTime::fromArray($data['createdAt']),
            $data['status']
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
     * Gets status
     *
     * @return string Статус сборочного задания: 'NEW', 'IN_ASSEMBLY', 'ASSEMBLED', 'CANCELED'
     */
    public function getStatus(): string
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
            'pageSize' => $this->pageSize,
            'pageToken' => $this->pageToken,
            'dir' => $this->dir,
            'orderId' => $this->orderId,
            'createdAt' => $this->createdAt,
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
