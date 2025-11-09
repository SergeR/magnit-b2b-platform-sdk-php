<?php
/**
 * MarketplaceSkuItem - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * MarketplaceSkuItem - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class MarketplaceSkuItem implements \JsonSerializable
{
    /**
     * @var int
     */
    private $skuId;

    /**
     * @var int
     */
    private $quantity;

            /**
     * Constructor
     */
    public function __construct(
        int $skuId,
        int $quantity
    ) {
        $this->skuId = $skuId;
        $this->quantity = $quantity;
    }
        if (isset($data['quantity'])) {
            $this->quantity = $data['quantity'];
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
            $data['sku_id'],
            $data['quantity']
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
     * Gets skuId
     *
     * @return int
     */
    public function getSkuId()
    {
        return $this->skuId;
    }

    /**
     * Gets quantity
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = [];
        
        if (isset($this->skuId)) {
            $data['sku_id'] = $this->skuId;
        }
        if (isset($this->quantity)) {
            $data['quantity'] = $this->quantity;
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
