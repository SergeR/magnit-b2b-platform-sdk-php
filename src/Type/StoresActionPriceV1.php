<?php
/**
 * StoresActionPriceV1 - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * StoresActionPriceV1 - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class StoresActionPriceV1 implements \JsonSerializable
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
     * @var string
     */
    private string $startedAt;

    /**
     * @var string
     */
    private string $finishedAt;

    /**
     * Constructor
     */
    public function __construct(
        int $value,
        CurrencyEnum $currency,
        string $startedAt,
        string $finishedAt
    ) {
        $this->value = $value;
        $this->currency = $currency;
        $this->startedAt = $startedAt;
        $this->finishedAt = $finishedAt;
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
            CurrencyEnum::fromArray($data['currency']),
            $data['startedAt'],
            $data['finishedAt']
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
     * Gets startedAt
     *
     * @return string
     */
    public function getStartedAt(): string
    {
        return $this->startedAt;
    }

    /**
     * Gets finishedAt
     *
     * @return string
     */
    public function getFinishedAt(): string
    {
        return $this->finishedAt;
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
            'startedAt' => $this->startedAt,
            'finishedAt' => $this->finishedAt,
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
