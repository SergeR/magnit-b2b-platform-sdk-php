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
    private $sellerSkuId;

    /**
     * @var int
     */
    private $skuId;

    /**
     * @var StockInfoDetails[]
     */
    private $stockInfoDetails;

            /**
     * Constructor
     */
    public function __construct(
        string $sellerSkuId,
        int $skuId,
        StockInfoDetails[] $stockInfoDetails
    ) {
        $this->sellerSkuId = $sellerSkuId;
        $this->skuId = $skuId;
        $this->stockInfoDetails = $stockInfoDetails;
    }
        if (isset($data['sku_id'])) {
            $this->skuId = $data['sku_id'];
        }
        if (isset($data['stock_info_details'])) {
            $this->stockInfoDetails = $data['stock_info_details'];
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
            isset($data['stock_info_details']) ? array_map(fn($item) => StockInfoDetails::fromArray($item), $data['stock_info_details']) : []
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
     * Gets stockInfoDetails
     *
     * @return StockInfoDetails[]
     */
    public function getStockInfoDetails()
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
        $data = [];
        
        if (isset($this->sellerSkuId)) {
            $data['seller_sku_id'] = $this->sellerSkuId;
        }
        if (isset($this->skuId)) {
            $data['sku_id'] = $this->skuId;
        }
        if (isset($this->stockInfoDetails)) {
            $data['stock_info_details'] = array_map(function($item) {
                return $item instanceof \JsonSerializable ? $item->jsonSerialize() : $item;
            }, $this->stockInfoDetails);
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
