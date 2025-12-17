<?php
/**
 * MarketplaceOrdersUnprocessedRequestAllOf - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * MarketplaceOrdersUnprocessedRequestAllOf - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class MarketplaceOrdersUnprocessedRequestAllOf implements \JsonSerializable
{
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
        MarketplaceSortDirection $dir,
        MarketplaceFilterDateTime $cutoffTime
    ) {
        $this->dir = $dir;
        $this->cutoffTime = $cutoffTime;
    }

    /**
     * Созд��ть из массива
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self(
            MarketplaceSortDirection::fromArray($data['dir']),
            MarketplaceFilterDateTime::fromArray($data['cutoffTime'])
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
