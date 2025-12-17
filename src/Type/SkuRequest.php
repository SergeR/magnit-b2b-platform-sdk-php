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
    private int $barcode;

    /**
     * @var int
     */
    private int $categoryId;

    /**
     * @var string
     */
    private string $certificate;

    /**
     * @var string
     */
    private string $composition;

    /**
     * @var string
     */
    private string $currencyCode;

    /**
     * @var CustomSkuCharacteristic[]
     */
    private array $customCharacteristicValuesSkus;

    /**
     * @var SkuCharacteristic[]
     */
    private array $definedCharacteristicList;

    /**
     * @var int
     */
    private int $depth;

    /**
     * @var string
     */
    private string $description;

    /**
     * @var int
     */
    private int $height;

    /**
     * @var string
     */
    private string $instruction;

    /**
     * @var int
     */
    private int $length;

    /**
     * @var string
     */
    private string $okpd2;

    /**
     * @var int
     */
    private int $oldPrice;

    /**
     * @var ProductVisualEffects
     */
    private ProductVisualEffects $photo360;

    /**
     * @var int
     */
    private int $price;

    /**
     * @var string[]
     */
    private array $productAttributes;

    /**
     * @var SkuCharacteristic[]
     */
    private array $productFiltersList;

    /**
     * @var ProductVisualEffects[]
     */
    private array $productImages;

    /**
     * @var string
     */
    private string $sellerSkuId;

    /**
     * @var int
     */
    private int $shopId;

    /**
     * @var string
     */
    private string $shortDescription;

    /**
     * @var string
     */
    private string $sizeChart;

    /**
     * @var SkuCharacteristic[]
     */
    private array $skuCharacteristicList;

    /**
     * @var CreateSkuFilter[]
     */
    private array $skuFilterList;

    /**
     * @var string
     */
    private string $skuGroupId;

    /**
     * @var string
     */
    private string $title;

    /**
     * @var string
     */
    private string $vat;

    /**
     * @var ProductVisualEffects
     */
    private ProductVisualEffects $video;

    /**
     * @var int
     */
    private int $weight;

    /**
     * @var int
     */
    private int $width;

    /**
     * Constructor
     */
    public function __construct(
        int $barcode,
        int $categoryId,
        string $certificate,
        string $composition,
        string $currencyCode,
        array $customCharacteristicValuesSkus,
        array $definedCharacteristicList,
        int $depth,
        string $description,
        int $height,
        string $instruction,
        int $length,
        string $okpd2,
        int $oldPrice,
        ProductVisualEffects $photo360,
        int $price,
        array $productAttributes,
        array $productFiltersList,
        array $productImages,
        string $sellerSkuId,
        int $shopId,
        string $shortDescription,
        string $sizeChart,
        array $skuCharacteristicList,
        array $skuFilterList,
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
            $data['categoryId'],
            $data['certificate'],
            $data['composition'],
            $data['currencyCode'],
            isset($data['customCharacteristicValuesSkus']) ? array_map(
                fn($item) => CustomSkuCharacteristic::fromArray($item),
                $data['customCharacteristicValuesSkus']
            ) : [],
            isset($data['definedCharacteristicList']) ? array_map(fn($item) => SkuCharacteristic::fromArray($item),
                $data['definedCharacteristicList']) : [],
            $data['depth'],
            $data['description'],
            $data['height'],
            $data['instruction'],
            $data['length'],
            $data['okpd2'],
            $data['oldPrice'],
            ProductVisualEffects::fromArray($data['photo360']),
            $data['price'],
            $data['productAttributes'],
            isset($data['productFiltersList']) ? array_map(fn($item) => SkuCharacteristic::fromArray($item),
                $data['productFiltersList']) : [],
            isset($data['productImages']) ? array_map(fn($item) => ProductVisualEffects::fromArray($item),
                $data['productImages']) : [],
            $data['sellerSkuId'],
            $data['shopId'],
            $data['shortDescription'],
            $data['sizeChart'],
            isset($data['skuCharacteristicList']) ? array_map(fn($item) => SkuCharacteristic::fromArray($item),
                $data['skuCharacteristicList']) : [],
            isset($data['skuFilterList']) ? array_map(fn($item) => CreateSkuFilter::fromArray($item),
                $data['skuFilterList']) : [],
            $data['skuGroupId'],
            $data['title'],
            $data['vat'],
            ProductVisualEffects::fromArray($data['video']),
            $data['weight'],
            $data['width']
        );
    }

    /**
     * Gets barcode
     *
     * @return int
     */
    public function getBarcode(): int
    {
        return $this->barcode;
    }

    /**
     * Gets categoryId
     *
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    /**
     * Gets certificate
     *
     * @return string
     */
    public function getCertificate(): string
    {
        return $this->certificate;
    }

    /**
     * Gets composition
     *
     * @return string
     */
    public function getComposition(): string
    {
        return $this->composition;
    }

    /**
     * Gets currencyCode
     *
     * @return string
     */
    public function getCurrencyCode(): string
    {
        return $this->currencyCode;
    }

    /**
     * Gets customCharacteristicValuesSkus
     *
     * @return CustomSkuCharacteristic[]
     */
    public function getCustomCharacteristicValuesSkus(): array
    {
        return $this->customCharacteristicValuesSkus;
    }

    /**
     * Gets definedCharacteristicList
     *
     * @return SkuCharacteristic[]
     */
    public function getDefinedCharacteristicList(): array
    {
        return $this->definedCharacteristicList;
    }

    /**
     * Gets depth
     *
     * @return int
     */
    public function getDepth(): int
    {
        return $this->depth;
    }

    /**
     * Gets description
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Gets height
     *
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * Gets instruction
     *
     * @return string
     */
    public function getInstruction(): string
    {
        return $this->instruction;
    }

    /**
     * Gets length
     *
     * @return int
     */
    public function getLength(): int
    {
        return $this->length;
    }

    /**
     * Gets okpd2
     *
     * @return string
     */
    public function getOkpd2(): string
    {
        return $this->okpd2;
    }

    /**
     * Gets oldPrice
     *
     * @return int
     */
    public function getOldPrice(): int
    {
        return $this->oldPrice;
    }

    /**
     * Gets photo360
     *
     * @return ProductVisualEffects
     */
    public function getPhoto360(): ProductVisualEffects
    {
        return $this->photo360;
    }

    /**
     * Gets price
     *
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * Gets productAttributes
     *
     * @return string[]
     */
    public function getProductAttributes(): array
    {
        return $this->productAttributes;
    }

    /**
     * Gets productFiltersList
     *
     * @return SkuCharacteristic[]
     */
    public function getProductFiltersList(): array
    {
        return $this->productFiltersList;
    }

    /**
     * Gets productImages
     *
     * @return ProductVisualEffects[]
     */
    public function getProductImages(): array
    {
        return $this->productImages;
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
     * Gets shopId
     *
     * @return int
     */
    public function getShopId(): int
    {
        return $this->shopId;
    }

    /**
     * Gets shortDescription
     *
     * @return string
     */
    public function getShortDescription(): string
    {
        return $this->shortDescription;
    }

    /**
     * Gets sizeChart
     *
     * @return string
     */
    public function getSizeChart(): string
    {
        return $this->sizeChart;
    }

    /**
     * Gets skuCharacteristicList
     *
     * @return SkuCharacteristic[]
     */
    public function getSkuCharacteristicList(): array
    {
        return $this->skuCharacteristicList;
    }

    /**
     * Gets skuFilterList
     *
     * @return CreateSkuFilter[]
     */
    public function getSkuFilterList(): array
    {
        return $this->skuFilterList;
    }

    /**
     * Gets skuGroupId
     *
     * @return string
     */
    public function getSkuGroupId(): string
    {
        return $this->skuGroupId;
    }

    /**
     * Gets title
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Gets vat
     *
     * @return string
     */
    public function getVat(): string
    {
        return $this->vat;
    }

    /**
     * Gets video
     *
     * @return ProductVisualEffects
     */
    public function getVideo(): ProductVisualEffects
    {
        return $this->video;
    }

    /**
     * Gets weight
     *
     * @return int
     */
    public function getWeight(): int
    {
        return $this->weight;
    }

    /**
     * Gets width
     *
     * @return int
     */
    public function getWidth(): int
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
        return [
            'barcode' => $this->barcode,
            'categoryId' => $this->categoryId,
            'certificate' => $this->certificate,
            'composition' => $this->composition,
            'currencyCode' => $this->currencyCode,
            'customCharacteristicValuesSkus' => array_map(fn($item) => $item->jsonSerialize(),
                $this->customCharacteristicValuesSkus),
            'definedCharacteristicList' => array_map(fn($item) => $item->jsonSerialize(),
                $this->definedCharacteristicList),
            'depth' => $this->depth,
            'description' => $this->description,
            'height' => $this->height,
            'instruction' => $this->instruction,
            'length' => $this->length,
            'okpd2' => $this->okpd2,
            'oldPrice' => $this->oldPrice,
            'photo360' => $this->photo360,
            'price' => $this->price,
            'productAttributes' => $this->productAttributes,
            'productFiltersList' => array_map(fn($item) => $item->jsonSerialize(), $this->productFiltersList),
            'productImages' => array_map(fn($item) => $item->jsonSerialize(), $this->productImages),
            'sellerSkuId' => $this->sellerSkuId,
            'shopId' => $this->shopId,
            'shortDescription' => $this->shortDescription,
            'sizeChart' => $this->sizeChart,
            'skuCharacteristicList' => array_map(fn($item) => $item->jsonSerialize(), $this->skuCharacteristicList),
            'skuFilterList' => array_map(fn($item) => $item->jsonSerialize(), $this->skuFilterList),
            'skuGroupId' => $this->skuGroupId,
            'title' => $this->title,
            'vat' => $this->vat,
            'video' => $this->video,
            'weight' => $this->weight,
            'width' => $this->width,
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
