<?php
/**
 * MarketplaceOrderItemFinancialData - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * MarketplaceOrderItemFinancialData - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class MarketplaceOrderItemFinancialData implements \JsonSerializable
{
    /**
     * @var float
     */
    private float $oldPrice;

    /**
     * @var float
     */
    private float $price;

    /**
     * Constructor
     */
    public function __construct(
        float $oldPrice,
        float $price
    ) {
        $this->oldPrice = $oldPrice;
        $this->price = $price;
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
            $data['oldPrice'],
            $data['price']
        );
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
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'oldPrice' => $this->oldPrice,
            'price' => $this->price,
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
