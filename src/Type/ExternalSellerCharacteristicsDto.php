<?php
/**
 * ExternalSellerCharacteristicsDto - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * ExternalSellerCharacteristicsDto - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class ExternalSellerCharacteristicsDto implements \JsonSerializable
{
    /**
     * @var int
     */
    private $categoryId;

    /**
     * @var string
     */
    private $categoryTitle;

    /**
     * @var SkuCharacteristicCategoryDto[]
     */
    private $definedCharacteristic;

    /**
     * @var SkuCharacteristicCategoryDto[]
     */
    private $productFilter;

    /**
     * @var SkuCharacteristicCategoryDto[]
     */
    private $skuFilter;

            /**
     * Constructor
     */
    public function __construct(
        int $categoryId,
        string $categoryTitle,
        SkuCharacteristicCategoryDto[] $definedCharacteristic,
        SkuCharacteristicCategoryDto[] $productFilter,
        SkuCharacteristicCategoryDto[] $skuFilter
    ) {
        $this->categoryId = $categoryId;
        $this->categoryTitle = $categoryTitle;
        $this->definedCharacteristic = $definedCharacteristic;
        $this->productFilter = $productFilter;
        $this->skuFilter = $skuFilter;
    }
        if (isset($data['category_title'])) {
            $this->categoryTitle = $data['category_title'];
        }
        if (isset($data['defined_characteristic'])) {
            $this->definedCharacteristic = $data['defined_characteristic'];
        }
        if (isset($data['product_filter'])) {
            $this->productFilter = $data['product_filter'];
        }
        if (isset($data['sku_filter'])) {
            $this->skuFilter = $data['sku_filter'];
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
            $data['category_id'],
            $data['category_title'],
            isset($data['defined_characteristic']) ? array_map(fn($item) => SkuCharacteristicCategoryDto::fromArray($item), $data['defined_characteristic']) : [],
            isset($data['product_filter']) ? array_map(fn($item) => SkuCharacteristicCategoryDto::fromArray($item), $data['product_filter']) : [],
            isset($data['sku_filter']) ? array_map(fn($item) => SkuCharacteristicCategoryDto::fromArray($item), $data['sku_filter']) : []
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
     * Gets categoryId
     *
     * @return int
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * Gets categoryTitle
     *
     * @return string
     */
    public function getCategoryTitle()
    {
        return $this->categoryTitle;
    }

    /**
     * Gets definedCharacteristic
     *
     * @return SkuCharacteristicCategoryDto[]
     */
    public function getDefinedCharacteristic()
    {
        return $this->definedCharacteristic;
    }

    /**
     * Gets productFilter
     *
     * @return SkuCharacteristicCategoryDto[]
     */
    public function getProductFilter()
    {
        return $this->productFilter;
    }

    /**
     * Gets skuFilter
     *
     * @return SkuCharacteristicCategoryDto[]
     */
    public function getSkuFilter()
    {
        return $this->skuFilter;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = [];
        
        if (isset($this->categoryId)) {
            $data['category_id'] = $this->categoryId;
        }
        if (isset($this->categoryTitle)) {
            $data['category_title'] = $this->categoryTitle;
        }
        if (isset($this->definedCharacteristic)) {
            $data['defined_characteristic'] = array_map(function($item) {
                return $item instanceof \JsonSerializable ? $item->jsonSerialize() : $item;
            }, $this->definedCharacteristic);
        }
        if (isset($this->productFilter)) {
            $data['product_filter'] = array_map(function($item) {
                return $item instanceof \JsonSerializable ? $item->jsonSerialize() : $item;
            }, $this->productFilter);
        }
        if (isset($this->skuFilter)) {
            $data['sku_filter'] = array_map(function($item) {
                return $item instanceof \JsonSerializable ? $item->jsonSerialize() : $item;
            }, $this->skuFilter);
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
