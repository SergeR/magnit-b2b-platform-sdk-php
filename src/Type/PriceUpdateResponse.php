<?php
/**
 * PriceUpdateResponse - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * PriceUpdateResponse - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class PriceUpdateResponse implements \JsonSerializable
{
    /**
     * @var string
     */
    private $currencyCode;

    /**
     * @var string
     */
    private $error;

    /**
     * @var float
     */
    private $oldPrice;

    /**
     * @var float
     */
    private $price;

    /**
     * @var string
     */
    private $sellerSkuId;

    /**
     * @var int
     */
    private $skuId;

            /**
     * Constructor
     */
    public function __construct(
        string $currencyCode,
        string $error,
        float $oldPrice,
        float $price,
        string $sellerSkuId,
        int $skuId
    ) {
        $this->currencyCode = $currencyCode;
        $this->error = $error;
        $this->oldPrice = $oldPrice;
        $this->price = $price;
        $this->sellerSkuId = $sellerSkuId;
        $this->skuId = $skuId;
    }
        if (isset($data['error'])) {
            $this->error = $data['error'];
        }
        if (isset($data['old_price'])) {
            $this->oldPrice = $data['old_price'];
        }
        if (isset($data['price'])) {
            $this->price = $data['price'];
        }
        if (isset($data['seller_sku_id'])) {
            $this->sellerSkuId = $data['seller_sku_id'];
        }
        if (isset($data['sku_id'])) {
            $this->skuId = $data['sku_id'];
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
            $data['currency_code'],
            $data['error'],
            $data['old_price'],
            $data['price'],
            $data['seller_sku_id'],
            $data['sku_id']
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
     * Gets currencyCode
     *
     * @return string
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    /**
     * Gets error
     *
     * @return string
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * Gets oldPrice
     *
     * @return float
     */
    public function getOldPrice()
    {
        return $this->oldPrice;
    }

    /**
     * Gets price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
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
     * Gets skuId
     *
     * @return int
     */
    public function getSkuId()
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
        $data = [];
        
        if (isset($this->currencyCode)) {
            $data['currency_code'] = $this->currencyCode;
        }
        if (isset($this->error)) {
            $data['error'] = $this->error;
        }
        if (isset($this->oldPrice)) {
            $data['old_price'] = $this->oldPrice;
        }
        if (isset($this->price)) {
            $data['price'] = $this->price;
        }
        if (isset($this->sellerSkuId)) {
            $data['seller_sku_id'] = $this->sellerSkuId;
        }
        if (isset($this->skuId)) {
            $data['sku_id'] = $this->skuId;
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
