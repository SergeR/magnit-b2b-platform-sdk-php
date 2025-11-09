<?php
/**
 * PriceInfoResponse - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * PriceInfoResponse - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class PriceInfoResponse implements \JsonSerializable
{
    /**
     * @var float
     */
    private $commissionAmount;

    /**
     * @var string
     */
    private $commissionCurrencyCode;

    /**
     * @var int
     */
    private $commissionPercent;

    /**
     * @var string
     */
    private $currencyCode;

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
     * @var \DateTime
     */
    private $timestamp;

            /**
     * Constructor
     */
    public function __construct(
        float $commissionAmount,
        string $commissionCurrencyCode,
        int $commissionPercent,
        string $currencyCode,
        float $oldPrice,
        float $price,
        string $sellerSkuId,
        int $skuId,
        \DateTime $timestamp
    ) {
        $this->commissionAmount = $commissionAmount;
        $this->commissionCurrencyCode = $commissionCurrencyCode;
        $this->commissionPercent = $commissionPercent;
        $this->currencyCode = $currencyCode;
        $this->oldPrice = $oldPrice;
        $this->price = $price;
        $this->sellerSkuId = $sellerSkuId;
        $this->skuId = $skuId;
        $this->timestamp = $timestamp;
    }
        if (isset($data['commission_currency_code'])) {
            $this->commissionCurrencyCode = $data['commission_currency_code'];
        }
        if (isset($data['commission_percent'])) {
            $this->commissionPercent = $data['commission_percent'];
        }
        if (isset($data['currency_code'])) {
            $this->currencyCode = $data['currency_code'];
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
        if (isset($data['timestamp'])) {
            $this->timestamp = $data['timestamp'];
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
            $data['commission_amount'],
            $data['commission_currency_code'],
            $data['commission_percent'],
            $data['currency_code'],
            $data['old_price'],
            $data['price'],
            $data['seller_sku_id'],
            $data['sku_id'],
            \DateTime::fromArray($data['timestamp'])
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
     * Gets commissionAmount
     *
     * @return float
     */
    public function getCommissionAmount()
    {
        return $this->commissionAmount;
    }

    /**
     * Gets commissionCurrencyCode
     *
     * @return string
     */
    public function getCommissionCurrencyCode()
    {
        return $this->commissionCurrencyCode;
    }

    /**
     * Gets commissionPercent
     *
     * @return int
     */
    public function getCommissionPercent()
    {
        return $this->commissionPercent;
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
     * Gets timestamp
     *
     * @return \DateTime
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = [];
        
        if (isset($this->commissionAmount)) {
            $data['commission_amount'] = $this->commissionAmount;
        }
        if (isset($this->commissionCurrencyCode)) {
            $data['commission_currency_code'] = $this->commissionCurrencyCode;
        }
        if (isset($this->commissionPercent)) {
            $data['commission_percent'] = $this->commissionPercent;
        }
        if (isset($this->currencyCode)) {
            $data['currency_code'] = $this->currencyCode;
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
        if (isset($this->timestamp)) {
            $data['timestamp'] = $this->timestamp instanceof \JsonSerializable ? $this->timestamp->jsonSerialize() : $this->timestamp;
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
