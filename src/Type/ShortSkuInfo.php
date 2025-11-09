<?php
/**
 * ShortSkuInfo - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * ShortSkuInfo - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class ShortSkuInfo implements \JsonSerializable
{
    /**
     * @var int
     */
    private $barcode;

    /**
     * @var int
     */
    private $productId;

    /**
     * @var string
     */
    private $sellerSkuId;

    /**
     * @var int
     */
    private $skuId;

            /**
     * Constructor
     */
    public function __construct(
        int $barcode,
        int $productId,
        string $sellerSkuId,
        int $skuId
    ) {
        $this->barcode = $barcode;
        $this->productId = $productId;
        $this->sellerSkuId = $sellerSkuId;
        $this->skuId = $skuId;
    }
        if (isset($data['product_id'])) {
            $this->productId = $data['product_id'];
        }
        if (isset($data['seller_sku_id'])) {
            $this->sellerSkuId = $data['seller_sku_id'];
        }
        if (isset($data['sku_id'])) {
            $this->skuId = $data['sku_id'];
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
            $data['barcode'],
            $data['product_id'],
            $data['seller_sku_id'],
            $data['sku_id']
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
     * Gets barcode
     *
     * @return int
     */
    public function getBarcode()
    {
        return $this->barcode;
    }

    /**
     * Gets productId
     *
     * @return int
     */
    public function getProductId()
    {
        return $this->productId;
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
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = [];
        
        if (isset($this->barcode)) {
            $data['barcode'] = $this->barcode;
        }
        if (isset($this->productId)) {
            $data['product_id'] = $this->productId;
        }
        if (isset($this->sellerSkuId)) {
            $data['seller_sku_id'] = $this->sellerSkuId;
        }
        if (isset($this->skuId)) {
            $data['sku_id'] = $this->skuId;
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
