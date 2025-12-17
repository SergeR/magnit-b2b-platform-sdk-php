<?php
/**
 * StockInfoResponse - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * StockInfoResponse - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class StockInfoResponse implements \JsonSerializable
{
    /**
     * @var string
     */
    private string $sellerSkuId;

    /**
     * @var int
     */
    private int $skuId;

    /**
     * @var StockInfoDetails[]
     */
    private array $stockInfoDetails;

    /**
     * Constructor
     */
    public function __construct(
        string $sellerSkuId,
        int $skuId,
        array $stockInfoDetails
    ) {
        $this->sellerSkuId = $sellerSkuId;
        $this->skuId = $skuId;
        $this->stockInfoDetails = $stockInfoDetails;
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
            $data['sellerSkuId'],
            $data['skuId'],
            isset($data['stockInfoDetails']) ? array_map(fn($item) => StockInfoDetails::fromArray($item),
                $data['stockInfoDetails']) : []
        );
    }

    /**
     * Gets sellerSkuId
     *
     * @return string
     */
    public function getSellerSkuId(): string
    {
        return $this->sellerSkuId;
    }

    /**
     * Gets skuId
     *
     * @return int
     */
    public function getSkuId(): int
    {
        return $this->skuId;
    }

    /**
     * Gets stockInfoDetails
     *
     * @return StockInfoDetails[]
     */
    public function getStockInfoDetails(): array
    {
        return $this->stockInfoDetails;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'sellerSkuId' => $this->sellerSkuId,
            'skuId' => $this->skuId,
            'stockInfoDetails' => array_map(fn($item) => $item->jsonSerialize(), $this->stockInfoDetails),
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
