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
    private $sellerSkuId;

    /**
     * @var int
     */
    private $skuId;

    /**
     * @var int
     */
    private $stock;

    /**
     * @var string
     */
    private $warehouseId;

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
        if (isset($data['sku_id'])) {
            $this->skuId = $data['sku_id'];
        }
        if (isset($data['stock'])) {
            $this->stock = $data['stock'];
        }
        if (isset($data['warehouse_id'])) {
            $this->warehouseId = $data['warehouse_id'];
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
            $data['seller_sku_id'],
            $data['sku_id'],
            $data['stock'],
            $data['warehouse_id']
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
     * Gets sellerSkuId
     *
     * @return string
     */
    public function getSellerSkuId()
    {
        return $this->sellerSkuId;
    }

    /**
     * Gets skuId
     *
     * @return int
     */
    public function getSkuId()
    {
        return $this->skuId;
    }

    /**
     * Gets stock
     *
     * @return int
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Gets warehouseId
     *
     * @return string
     */
    public function getWarehouseId()
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
        $data = [];
        
        if (isset($this->sellerSkuId)) {
            $data['seller_sku_id'] = $this->sellerSkuId;
        }
        if (isset($this->skuId)) {
            $data['sku_id'] = $this->skuId;
        }
        if (isset($this->stock)) {
            $data['stock'] = $this->stock;
        }
        if (isset($this->warehouseId)) {
            $data['warehouse_id'] = $this->warehouseId;
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
