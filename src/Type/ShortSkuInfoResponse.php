<?php
/**
 * ShortSkuInfoResponse - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * ShortSkuInfoResponse - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class ShortSkuInfoResponse implements \JsonSerializable
{
    /**
     * @var ShortSkuInfo[]
     */
    private $result;

    /**
     * @var int
     */
    private $resultCount;

    /**
     * @var int
     */
    private $shopId;

            /**
     * Constructor
     */
    public function __construct(
        ShortSkuInfo[] $result,
        int $resultCount,
        int $shopId
    ) {
        $this->result = $result;
        $this->resultCount = $resultCount;
        $this->shopId = $shopId;
    }
        if (isset($data['result_count'])) {
            $this->resultCount = $data['result_count'];
        }
        if (isset($data['shop_id'])) {
            $this->shopId = $data['shop_id'];
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
            isset($data['result']) ? array_map(fn($item) => ShortSkuInfo::fromArray($item), $data['result']) : [],
            $data['result_count'],
            $data['shop_id']
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
     * Gets result
     *
     * @return ShortSkuInfo[]
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Gets resultCount
     *
     * @return int
     */
    public function getResultCount()
    {
        return $this->resultCount;
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
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = [];
        
        if (isset($this->result)) {
            $data['result'] = array_map(function($item) {
                return $item instanceof \JsonSerializable ? $item->jsonSerialize() : $item;
            }, $this->result);
        }
        if (isset($this->resultCount)) {
            $data['result_count'] = $this->resultCount;
        }
        if (isset($this->shopId)) {
            $data['shop_id'] = $this->shopId;
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
