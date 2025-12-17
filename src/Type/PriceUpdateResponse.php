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
    private string $currencyCode;

    /**
     * @var string
     */
    private string $error;

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

    /**
     * Создать из массива
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['currencyCode'],
            $data['error'],
            $data['oldPrice'],
            $data['price'],
            $data['sellerSkuId'],
            $data['skuId']
        );
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
     * Gets error
     *
     * @return string
     */
    public function getError(): string
    {
        return $this->error;
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
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'currencyCode' => $this->currencyCode,
            'error' => $this->error,
            'oldPrice' => $this->oldPrice,
            'price' => $this->price,
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
