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
    private float $commissionAmount;

    /**
     * @var string
     */
    private string $commissionCurrencyCode;

    /**
     * @var int
     */
    private int $commissionPercent;

    /**
     * @var string
     */
    private string $currencyCode;

    /**
     * @var float
     */
    private float $oldPrice;

    /**
     * @var float
     */
    private float $price;

    /**
     * @var string
     */
    private string $sellerSkuId;

    /**
     * @var int
     */
    private int $skuId;

    /**
     * @var \DateTime
     */
    private \DateTime $timestamp;

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

    /**
     * Создать из массива
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['commissionAmount'],
            $data['commissionCurrencyCode'],
            $data['commissionPercent'],
            $data['currencyCode'],
            $data['oldPrice'],
            $data['price'],
            $data['sellerSkuId'],
            $data['skuId'],
            new \DateTime("@{$data['timestamp']}")
        );
    }

    /**
     * Gets commissionAmount
     *
     * @return float
     */
    public function getCommissionAmount(): float
    {
        return $this->commissionAmount;
    }

    /**
     * Gets commissionCurrencyCode
     *
     * @return string
     */
    public function getCommissionCurrencyCode(): string
    {
        return $this->commissionCurrencyCode;
    }

    /**
     * Gets commissionPercent
     *
     * @return int
     */
    public function getCommissionPercent(): int
    {
        return $this->commissionPercent;
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
     * Gets oldPrice
     *
     * @return float
     */
    public function getOldPrice(): float
    {
        return $this->oldPrice;
    }

    /**
     * Gets price
     *
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
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
     * Gets timestamp
     *
     * @return \DateTime
     */
    public function getTimestamp(): \DateTime
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
        return [
            'commissionAmount' => $this->commissionAmount,
            'commissionCurrencyCode' => $this->commissionCurrencyCode,
            'commissionPercent' => $this->commissionPercent,
            'currencyCode' => $this->currencyCode,
            'oldPrice' => $this->oldPrice,
            'price' => $this->price,
            'sellerSkuId' => $this->sellerSkuId,
            'skuId' => $this->skuId,
            'timestamp' => $this->timestamp,
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
