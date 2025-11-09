<?php
/**
 * SkuRequest - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * SkuRequest - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class SkuRequest implements \JsonSerializable
{
    /**
     * @var int
     */
    private $barcode;

    /**
     * @var int
     */
    private $categoryId;

    /**
     * @var string
     */
    private $certificate;

    /**
     * @var string
     */
    private $composition;

    /**
     * @var string
     */
    private $currencyCode;

    /**
     * @var CustomSkuCharacteristic[]
     */
    private $customCharacteristicValuesSkus;

    /**
     * @var SkuCharacteristic[]
     */
    private $definedCharacteristicList;

    /**
     * @var int
     */
    private $depth;

    /**
     * @var string
     */
    private $description;

    /**
     * @var int
     */
    private $height;

    /**
     * @var string
     */
    private $instruction;

    /**
     * @var int
     */
    private $length;

    /**
     * @var string
     */
    private $okpd2;

    /**
     * @var int
     */
    private $oldPrice;

    /**
     * @var ProductVisualEffects
     */
    private $photo360;

    /**
     * @var int
     */
    private $price;

    /**
     * @var string[]
     */
    private $productAttributes;

    /**
     * @var SkuCharacteristic[]
     */
    private $productFiltersList;

    /**
     * @var ProductVisualEffects[]
     */
    private $productImages;

    /**
     * @var string
     */
    private $sellerSkuId;

    /**
     * @var int
     */
    private $shopId;

    /**
     * @var string
     */
    private $shortDescription;

    /**
     * @var string
     */
    private $sizeChart;

    /**
     * @var SkuCharacteristic[]
     */
    private $skuCharacteristicList;

    /**
     * @var CreateSkuFilter[]
     */
    private $skuFilterList;

    /**
     * @var string
     */
    private $skuGroupId;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $vat;

    /**
     * @var ProductVisualEffects
     */
    private $video;

    /**
     * @var int
     */
    private $weight;

    /**
     * @var int
     */
    private $width;

            /**
     * Constructor
     */
    public function __construct(
        int $barcode,
        int $categoryId,
        string $certificate,
        string $composition,
        string $currencyCode,
        CustomSkuCharacteristic[] $customCharacteristicValuesSkus,
        SkuCharacteristic[] $definedCharacteristicList,
        int $depth,
        string $description,
        int $height,
        string $instruction,
        int $length,
        string $okpd2,
        int $oldPrice,
        ProductVisualEffects $photo360,
        int $price,
        string[] $productAttributes,
        SkuCharacteristic[] $productFiltersList,
        ProductVisualEffects[] $productImages,
        string $sellerSkuId,
        int $shopId,
        string $shortDescription,
        string $sizeChart,
        SkuCharacteristic[] $skuCharacteristicList,
        CreateSkuFilter[] $skuFilterList,
        string $skuGroupId,
        string $title,
        string $vat,
        ProductVisualEffects $video,
        int $weight,
        int $width
    ) {
        $this->barcode = $barcode;
        $this->categoryId = $categoryId;
        $this->certificate = $certificate;
        $this->composition = $composition;
        $this->currencyCode = $currencyCode;
        $this->customCharacteristicValuesSkus = $customCharacteristicValuesSkus;
        $this->definedCharacteristicList = $definedCharacteristicList;
        $this->depth = $depth;
        $this->description = $description;
        $this->height = $height;
        $this->instruction = $instruction;
        $this->length = $length;
        $this->okpd2 = $okpd2;
        $this->oldPrice = $oldPrice;
        $this->photo360 = $photo360;
        $this->price = $price;
        $this->productAttributes = $productAttributes;
        $this->productFiltersList = $productFiltersList;
        $this->productImages = $productImages;
        $this->sellerSkuId = $sellerSkuId;
        $this->shopId = $shopId;
        $this->shortDescription = $shortDescription;
        $this->sizeChart = $sizeChart;
        $this->skuCharacteristicList = $skuCharacteristicList;
        $this->skuFilterList = $skuFilterList;
        $this->skuGroupId = $skuGroupId;
        $this->title = $title;
        $this->vat = $vat;
        $this->video = $video;
        $this->weight = $weight;
        $this->width = $width;
    }
        if (isset($data['category_id'])) {
            $this->categoryId = $data['category_id'];
        }
        if (isset($data['certificate'])) {
            $this->certificate = $data['certificate'];
        }
        if (isset($data['composition'])) {
            $this->composition = $data['composition'];
        }
        if (isset($data['currency_code'])) {
            $this->currencyCode = $data['currency_code'];
        }
        if (isset($data['custom_characteristic_values_skus'])) {
            $this->customCharacteristicValuesSkus = $data['custom_characteristic_values_skus'];
        }
        if (isset($data['defined_characteristic_list'])) {
            $this->definedCharacteristicList = $data['defined_characteristic_list'];
        }
        if (isset($data['depth'])) {
            $this->depth = $data['depth'];
        }
        if (isset($data['description'])) {
            $this->description = $data['description'];
        }
        if (isset($data['height'])) {
            $this->height = $data['height'];
        }
        if (isset($data['instruction'])) {
            $this->instruction = $data['instruction'];
        }
        if (isset($data['length'])) {
            $this->length = $data['length'];
        }
        if (isset($data['okpd2'])) {
            $this->okpd2 = $data['okpd2'];
        }
        if (isset($data['old_price'])) {
            $this->oldPrice = $data['old_price'];
        }
        if (isset($data['photo360'])) {
            $this->photo360 = $data['photo360'];
        }
        if (isset($data['price'])) {
            $this->price = $data['price'];
        }
        if (isset($data['product_attributes'])) {
            $this->productAttributes = $data['product_attributes'];
        }
        if (isset($data['product_filters_list'])) {
            $this->productFiltersList = $data['product_filters_list'];
        }
        if (isset($data['product_images'])) {
            $this->productImages = $data['product_images'];
        }
        if (isset($data['seller_sku_id'])) {
            $this->sellerSkuId = $data['seller_sku_id'];
        }
        if (isset($data['shop_id'])) {
            $this->shopId = $data['shop_id'];
        }
        if (isset($data['short_description'])) {
            $this->shortDescription = $data['short_description'];
        }
        if (isset($data['size_chart'])) {
            $this->sizeChart = $data['size_chart'];
        }
        if (isset($data['sku_characteristic_list'])) {
            $this->skuCharacteristicList = $data['sku_characteristic_list'];
        }
        if (isset($data['sku_filter_list'])) {
            $this->skuFilterList = $data['sku_filter_list'];
        }
        if (isset($data['sku_group_id'])) {
            $this->skuGroupId = $data['sku_group_id'];
        }
        if (isset($data['title'])) {
            $this->title = $data['title'];
        }
        if (isset($data['vat'])) {
            $this->vat = $data['vat'];
        }
        if (isset($data['video'])) {
            $this->video = $data['video'];
        }
        if (isset($data['weight'])) {
            $this->weight = $data['weight'];
        }
        if (isset($data['width'])) {
            $this->width = $data['width'];
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
            $data['category_id'],
            $data['certificate'],
            $data['composition'],
            $data['currency_code'],
            isset($data['custom_characteristic_values_skus']) ? array_map(fn($item) => CustomSkuCharacteristic::fromArray($item), $data['custom_characteristic_values_skus']) : [],
            isset($data['defined_characteristic_list']) ? array_map(fn($item) => SkuCharacteristic::fromArray($item), $data['defined_characteristic_list']) : [],
            $data['depth'],
            $data['description'],
            $data['height'],
            $data['instruction'],
            $data['length'],
            $data['okpd2'],
            $data['old_price'],
            ProductVisualEffects::fromArray($data['photo360']),
            $data['price'],
            $data['product_attributes'],
            isset($data['product_filters_list']) ? array_map(fn($item) => SkuCharacteristic::fromArray($item), $data['product_filters_list']) : [],
            isset($data['product_images']) ? array_map(fn($item) => ProductVisualEffects::fromArray($item), $data['product_images']) : [],
            $data['seller_sku_id'],
            $data['shop_id'],
            $data['short_description'],
            $data['size_chart'],
            isset($data['sku_characteristic_list']) ? array_map(fn($item) => SkuCharacteristic::fromArray($item), $data['sku_characteristic_list']) : [],
            isset($data['sku_filter_list']) ? array_map(fn($item) => CreateSkuFilter::fromArray($item), $data['sku_filter_list']) : [],
            $data['sku_group_id'],
            $data['title'],
            $data['vat'],
            ProductVisualEffects::fromArray($data['video']),
            $data['weight'],
            $data['width']
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
     * Gets categoryId
     *
     * @return int
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * Gets certificate
     *
     * @return string
     */
    public function getCertificate()
    {
        return $this->certificate;
    }

    /**
     * Gets composition
     *
     * @return string
     */
    public function getComposition()
    {
        return $this->composition;
    }

    /**
     * Gets currencyCode
     *
     * @return string
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    /**
     * Gets customCharacteristicValuesSkus
     *
     * @return CustomSkuCharacteristic[]
     */
    public function getCustomCharacteristicValuesSkus()
    {
        return $this->customCharacteristicValuesSkus;
    }

    /**
     * Gets definedCharacteristicList
     *
     * @return SkuCharacteristic[]
     */
    public function getDefinedCharacteristicList()
    {
        return $this->definedCharacteristicList;
    }

    /**
     * Gets depth
     *
     * @return int
     */
    public function getDepth()
    {
        return $this->depth;
    }

    /**
     * Gets description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Gets height
     *
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Gets instruction
     *
     * @return string
     */
    public function getInstruction()
    {
        return $this->instruction;
    }

    /**
     * Gets length
     *
     * @return int
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Gets okpd2
     *
     * @return string
     */
    public function getOkpd2()
    {
        return $this->okpd2;
    }

    /**
     * Gets oldPrice
     *
     * @return int
     */
    public function getOldPrice()
    {
        return $this->oldPrice;
    }

    /**
     * Gets photo360
     *
     * @return ProductVisualEffects
     */
    public function getPhoto360()
    {
        return $this->photo360;
    }

    /**
     * Gets price
     *
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Gets productAttributes
     *
     * @return string[]
     */
    public function getProductAttributes()
    {
        return $this->productAttributes;
    }

    /**
     * Gets productFiltersList
     *
     * @return SkuCharacteristic[]
     */
    public function getProductFiltersList()
    {
        return $this->productFiltersList;
    }

    /**
     * Gets productImages
     *
     * @return ProductVisualEffects[]
     */
    public function getProductImages()
    {
        return $this->productImages;
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
     * Gets shopId
     *
     * @return int
     */
    public function getShopId()
    {
        return $this->shopId;
    }

    /**
     * Gets shortDescription
     *
     * @return string
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    /**
     * Gets sizeChart
     *
     * @return string
     */
    public function getSizeChart()
    {
        return $this->sizeChart;
    }

    /**
     * Gets skuCharacteristicList
     *
     * @return SkuCharacteristic[]
     */
    public function getSkuCharacteristicList()
    {
        return $this->skuCharacteristicList;
    }

    /**
     * Gets skuFilterList
     *
     * @return CreateSkuFilter[]
     */
    public function getSkuFilterList()
    {
        return $this->skuFilterList;
    }

    /**
     * Gets skuGroupId
     *
     * @return string
     */
    public function getSkuGroupId()
    {
        return $this->skuGroupId;
    }

    /**
     * Gets title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Gets vat
     *
     * @return string
     */
    public function getVat()
    {
        return $this->vat;
    }

    /**
     * Gets video
     *
     * @return ProductVisualEffects
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * Gets weight
     *
     * @return int
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Gets width
     *
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
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
        if (isset($this->categoryId)) {
            $data['category_id'] = $this->categoryId;
        }
        if (isset($this->certificate)) {
            $data['certificate'] = $this->certificate;
        }
        if (isset($this->composition)) {
            $data['composition'] = $this->composition;
        }
        if (isset($this->currencyCode)) {
            $data['currency_code'] = $this->currencyCode;
        }
        if (isset($this->customCharacteristicValuesSkus)) {
            $data['custom_characteristic_values_skus'] = array_map(function($item) {
                return $item instanceof \JsonSerializable ? $item->jsonSerialize() : $item;
            }, $this->customCharacteristicValuesSkus);
        }
        if (isset($this->definedCharacteristicList)) {
            $data['defined_characteristic_list'] = array_map(function($item) {
                return $item instanceof \JsonSerializable ? $item->jsonSerialize() : $item;
            }, $this->definedCharacteristicList);
        }
        if (isset($this->depth)) {
            $data['depth'] = $this->depth;
        }
        if (isset($this->description)) {
            $data['description'] = $this->description;
        }
        if (isset($this->height)) {
            $data['height'] = $this->height;
        }
        if (isset($this->instruction)) {
            $data['instruction'] = $this->instruction;
        }
        if (isset($this->length)) {
            $data['length'] = $this->length;
        }
        if (isset($this->okpd2)) {
            $data['okpd2'] = $this->okpd2;
        }
        if (isset($this->oldPrice)) {
            $data['old_price'] = $this->oldPrice;
        }
        if (isset($this->photo360)) {
            $data['photo360'] = $this->photo360;
        }
        if (isset($this->price)) {
            $data['price'] = $this->price;
        }
        if (isset($this->productAttributes)) {
            $data['product_attributes'] = array_map(function($item) {
                return $item instanceof \JsonSerializable ? $item->jsonSerialize() : $item;
            }, $this->productAttributes);
        }
        if (isset($this->productFiltersList)) {
            $data['product_filters_list'] = array_map(function($item) {
                return $item instanceof \JsonSerializable ? $item->jsonSerialize() : $item;
            }, $this->productFiltersList);
        }
        if (isset($this->productImages)) {
            $data['product_images'] = array_map(function($item) {
                return $item instanceof \JsonSerializable ? $item->jsonSerialize() : $item;
            }, $this->productImages);
        }
        if (isset($this->sellerSkuId)) {
            $data['seller_sku_id'] = $this->sellerSkuId;
        }
        if (isset($this->shopId)) {
            $data['shop_id'] = $this->shopId;
        }
        if (isset($this->shortDescription)) {
            $data['short_description'] = $this->shortDescription;
        }
        if (isset($this->sizeChart)) {
            $data['size_chart'] = $this->sizeChart;
        }
        if (isset($this->skuCharacteristicList)) {
            $data['sku_characteristic_list'] = array_map(function($item) {
                return $item instanceof \JsonSerializable ? $item->jsonSerialize() : $item;
            }, $this->skuCharacteristicList);
        }
        if (isset($this->skuFilterList)) {
            $data['sku_filter_list'] = array_map(function($item) {
                return $item instanceof \JsonSerializable ? $item->jsonSerialize() : $item;
            }, $this->skuFilterList);
        }
        if (isset($this->skuGroupId)) {
            $data['sku_group_id'] = $this->skuGroupId;
        }
        if (isset($this->title)) {
            $data['title'] = $this->title;
        }
        if (isset($this->vat)) {
            $data['vat'] = $this->vat;
        }
        if (isset($this->video)) {
            $data['video'] = $this->video;
        }
        if (isset($this->weight)) {
            $data['weight'] = $this->weight;
        }
        if (isset($this->width)) {
            $data['width'] = $this->width;
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
