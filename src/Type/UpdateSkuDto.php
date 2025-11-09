<?php
/**
 * UpdateSkuDto - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * UpdateSkuDto - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class UpdateSkuDto implements \JsonSerializable
{
    /**
     * @var int
     */
    private $barcode;

    /**
     * @var SkuDimensions
     */
    private $dimensions;

    /**
     * @var string
     */
    private $sellerSkuId;

    /**
     * @var UpdateSkuFilter[]
     */
    private $skuFilterList;

            /**
     * Constructor
     */
    public function __construct(
        int $barcode,
        SkuDimensions $dimensions,
        string $sellerSkuId,
        UpdateSkuFilter[] $skuFilterList
    ) {
        $this->barcode = $barcode;
        $this->dimensions = $dimensions;
        $this->sellerSkuId = $sellerSkuId;
        $this->skuFilterList = $skuFilterList;
    }
        if (isset($data['dimensions'])) {
            $this->dimensions = $data['dimensions'];
        }
        if (isset($data['seller_sku_id'])) {
            $this->sellerSkuId = $data['seller_sku_id'];
        }
        if (isset($data['sku_filter_list'])) {
            $this->skuFilterList = $data['sku_filter_list'];
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
            SkuDimensions::fromArray($data['dimensions']),
            $data['seller_sku_id'],
            isset($data['sku_filter_list']) ? array_map(fn($item) => UpdateSkuFilter::fromArray($item), $data['sku_filter_list']) : []
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
     * Gets dimensions
     *
     * @return SkuDimensions
     */
    public function getDimensions()
    {
        return $this->dimensions;
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
     * Gets skuFilterList
     *
     * @return UpdateSkuFilter[]
     */
    public function getSkuFilterList()
    {
        return $this->skuFilterList;
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
        if (isset($this->dimensions)) {
            $data['dimensions'] = $this->dimensions;
        }
        if (isset($this->sellerSkuId)) {
            $data['seller_sku_id'] = $this->sellerSkuId;
        }
        if (isset($this->skuFilterList)) {
            $data['sku_filter_list'] = array_map(function($item) {
                return $item instanceof \JsonSerializable ? $item->jsonSerialize() : $item;
            }, $this->skuFilterList);
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
