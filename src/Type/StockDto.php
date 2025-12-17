<?php
/**
 * StockDto - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * StockDto - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class StockDto implements \JsonSerializable
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
     * @var int
     */
    private int $stock;

    /**
     * @var string
     */
    private string $warehouseId;

    /**
     * Constructor
     */
    public function __construct(
        string $sellerSkuId,
        int $skuId,
        int $stock,
        string $warehouseId
    ) {
        $this->sellerSkuId = $sellerSkuId;
        $this->skuId = $skuId;
        $this->stock = $stock;
        $this->warehouseId = $warehouseId;
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
            $data['stock'],
            $data['warehouseId']
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
     * Gets stock
     *
     * @return int
     */
    public function getStock(): int
    {
        return $this->stock;
    }

    /**
     * Gets warehouseId
     *
     * @return string
     */
    public function getWarehouseId(): string
    {
        return $this->warehouseId;
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
            'stock' => $this->stock,
            'warehouseId' => $this->warehouseId,
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
