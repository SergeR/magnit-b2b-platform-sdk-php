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
    private int $barcode;

    /**
     * @var int
     */
    private int $productId;

    /**
     * @var string
     */
    private string $sellerSkuId;

    /**
     * @var int
     */
    private int $skuId;

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
            $data['productId'],
            $data['sellerSkuId'],
            $data['skuId']
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
     * Gets productId
     *
     * @return int
     */
    public function getProductId(): int
    {
        return $this->productId;
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
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'barcode' => $this->barcode,
            'productId' => $this->productId,
            'sellerSkuId' => $this->sellerSkuId,
            'skuId' => $this->skuId,
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
