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
    private $sellerSkuIds;

    /**
     * @var int[]
     */
    private $skuIds;

            /**
     * Constructor
     */
    public function __construct(
        string[] $sellerSkuIds,
        int[] $skuIds
    ) {
        $this->sellerSkuIds = $sellerSkuIds;
        $this->skuIds = $skuIds;
    }
        if (isset($data['sku_ids'])) {
            $this->skuIds = $data['sku_ids'];
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
            $data['seller_sku_ids'],
            $data['sku_ids']
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
     * Gets sellerSkuIds
     *
     * @return string[]
     */
    public function getSellerSkuIds()
    {
        return $this->sellerSkuIds;
    }

    /**
     * Gets skuIds
     *
     * @return int[]
     */
    public function getSkuIds()
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
        $data = [];
        
        if (isset($this->sellerSkuIds)) {
            $data['seller_sku_ids'] = array_map(function($item) {
                return $item instanceof \JsonSerializable ? $item->jsonSerialize() : $item;
            }, $this->sellerSkuIds);
        }
        if (isset($this->skuIds)) {
            $data['sku_ids'] = array_map(function($item) {
                return $item instanceof \JsonSerializable ? $item->jsonSerialize() : $item;
            }, $this->skuIds);
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
