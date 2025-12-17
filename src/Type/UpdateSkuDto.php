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
    private int $barcode;

    /**
     * @var SkuDimensions
     */
    private SkuDimensions $dimensions;

    /**
     * @var string
     */
    private string $sellerSkuId;

    /**
     * @var UpdateSkuFilter[]
     */
    private array $skuFilterList;

    /**
     * Constructor
     */
    public function __construct(
        int $barcode,
        SkuDimensions $dimensions,
        string $sellerSkuId,
        array $skuFilterList
    ) {
        $this->barcode = $barcode;
        $this->dimensions = $dimensions;
        $this->sellerSkuId = $sellerSkuId;
        $this->skuFilterList = $skuFilterList;
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
            $data['sellerSkuId'],
            isset($data['skuFilterList']) ? array_map(fn($item) => UpdateSkuFilter::fromArray($item),
                $data['skuFilterList']) : []
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
     * Gets dimensions
     *
     * @return SkuDimensions
     */
    public function getDimensions(): SkuDimensions
    {
        return $this->dimensions;
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
     * Gets skuFilterList
     *
     * @return UpdateSkuFilter[]
     */
    public function getSkuFilterList(): array
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
        return [
            'barcode' => $this->barcode,
            'dimensions' => $this->dimensions,
            'sellerSkuId' => $this->sellerSkuId,
            'skuFilterList' => array_map(fn($item) => $item->jsonSerialize(), $this->skuFilterList),
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
