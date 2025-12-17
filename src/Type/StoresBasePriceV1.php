<?php
/**
 * StoresBasePriceV1 - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * StoresBasePriceV1 - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class StoresBasePriceV1 implements \JsonSerializable
{
    /**
     * @var int
     */
    private int $value;

    /**
     * @var CurrencyEnum
     */
    private CurrencyEnum $currency;

    /**
     * Constructor
     */
    public function __construct(
        int $value,
        CurrencyEnum $currency
    ) {
        $this->value = $value;
        $this->currency = $currency;
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
            $data['value'],
            CurrencyEnum::fromArray($data['currency'])
        );
    }

    /**
     * Gets value
     *
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * Gets currency
     *
     * @return CurrencyEnum
     */
    public function getCurrency(): CurrencyEnum
    {
        return $this->currency;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'value' => $this->value,
            'currency' => $this->currency,
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
