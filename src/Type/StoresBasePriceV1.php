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
    private $value;

    /**
     * @var CurrencyEnum
     */
    private $currency;

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
        if (isset($data['currency'])) {
            $this->currency = $data['currency'];
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
            $data['value'],
            CurrencyEnum::fromArray($data['currency'])
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
     * Gets value
     *
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Gets currency
     *
     * @return CurrencyEnum
     */
    public function getCurrency()
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
        $data = [];
        
        if (isset($this->value)) {
            $data['value'] = $this->value;
        }
        if (isset($this->currency)) {
            $data['currency'] = $this->currency;
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
