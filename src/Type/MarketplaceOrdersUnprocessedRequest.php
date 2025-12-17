<?php
/**
 * MarketplaceOrdersUnprocessedRequest - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * MarketplaceOrdersUnprocessedRequest - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class MarketplaceOrdersUnprocessedRequest implements \JsonSerializable
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
     * @var MarketplaceFilterDateTime
     */
    private MarketplaceFilterDateTime $cutoffTime;

    /**
     * Constructor
     */
    public function __construct(
        int $pageSize,
        string $pageToken,
        MarketplaceSortDirection $dir,
        MarketplaceFilterDateTime $cutoffTime
    ) {
        $this->pageSize = $pageSize;
        $this->pageToken = $pageToken;
        $this->dir = $dir;
        $this->cutoffTime = $cutoffTime;
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
            MarketplaceFilterDateTime::fromArray($data['cutoffTime'])
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
     * Gets cutoffTime
     *
     * @return MarketplaceFilterDateTime
     */
    public function getCutoffTime(): MarketplaceFilterDateTime
    {
        return $this->cutoffTime;
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
            'cutoffTime' => $this->cutoffTime,
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
