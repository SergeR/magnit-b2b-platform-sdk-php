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
    private int $categoryId;

    /**
     * @var string
     */
    private string $categoryTitle;

    /**
     * @var SkuCharacteristicCategoryDto[]
     */
    private array $definedCharacteristic;

    /**
     * @var SkuCharacteristicCategoryDto[]
     */
    private array $productFilter;

    /**
     * @var SkuCharacteristicCategoryDto[]
     */
    private array $skuFilter;

    /**
     * Constructor
     */
    public function __construct(
        int $categoryId,
        string $categoryTitle,
        array $definedCharacteristic,
        array $productFilter,
        array $skuFilter
    ) {
        $this->categoryId = $categoryId;
        $this->categoryTitle = $categoryTitle;
        $this->definedCharacteristic = $definedCharacteristic;
        $this->productFilter = $productFilter;
        $this->skuFilter = $skuFilter;
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
            $data['categoryId'],
            $data['categoryTitle'],
            isset($data['definedCharacteristic']) ? array_map(
                fn($item) => SkuCharacteristicCategoryDto::fromArray($item),
                $data['definedCharacteristic']
            ) : [],
            isset($data['productFilter']) ? array_map(fn($item) => SkuCharacteristicCategoryDto::fromArray($item),
                $data['productFilter']) : [],
            isset($data['skuFilter']) ? array_map(fn($item) => SkuCharacteristicCategoryDto::fromArray($item),
                $data['skuFilter']) : []
        );
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
     * Gets categoryTitle
     *
     * @return string
     */
    public function getCategoryTitle(): string
    {
        return $this->categoryTitle;
    }

    /**
     * Gets definedCharacteristic
     *
     * @return SkuCharacteristicCategoryDto[]
     */
    public function getDefinedCharacteristic(): array
    {
        return $this->definedCharacteristic;
    }

    /**
     * Gets productFilter
     *
     * @return SkuCharacteristicCategoryDto[]
     */
    public function getProductFilter(): array
    {
        return $this->productFilter;
    }

    /**
     * Gets skuFilter
     *
     * @return SkuCharacteristicCategoryDto[]
     */
    public function getSkuFilter(): array
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
        return [
            'categoryId' => $this->categoryId,
            'categoryTitle' => $this->categoryTitle,
            'definedCharacteristic' => array_map(fn($item) => $item->jsonSerialize(), $this->definedCharacteristic),
            'productFilter' => array_map(fn($item) => $item->jsonSerialize(), $this->productFilter),
            'skuFilter' => array_map(fn($item) => $item->jsonSerialize(), $this->skuFilter),
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
