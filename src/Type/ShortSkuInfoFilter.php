<?php
/**
 * ShortSkuInfoFilter - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * ShortSkuInfoFilter - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class ShortSkuInfoFilter implements \JsonSerializable
{
    /**
     * @var string[]
     */
    private array $sellerSkuIds;

    /**
     * @var int[]
     */
    private array $skuIds;

    /**
     * Constructor
     */
    public function __construct(
        array $sellerSkuIds,
        array $skuIds
    ) {
        $this->sellerSkuIds = $sellerSkuIds;
        $this->skuIds = $skuIds;
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
            $data['sellerSkuIds'],
            $data['skuIds']
        );
    }

    /**
     * Gets sellerSkuIds
     *
     * @return string[]
     */
    public function getSellerSkuIds(): array
    {
        return $this->sellerSkuIds;
    }

    /**
     * Gets skuIds
     *
     * @return int[]
     */
    public function getSkuIds(): array
    {
        return $this->skuIds;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'sellerSkuIds' => $this->sellerSkuIds,
            'skuIds' => $this->skuIds,
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
