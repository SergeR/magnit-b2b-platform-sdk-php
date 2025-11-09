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
    private $value;

    /**
     * @var CurrencyEnum
     */
    private $currency;

    /**
     * @var string
     */
    private $startedAt;

    /**
     * @var string
     */
    private $finishedAt;

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
        if (isset($data['currency'])) {
            $this->currency = $data['currency'];
        }
        if (isset($data['started_at'])) {
            $this->startedAt = $data['started_at'];
        }
        if (isset($data['finished_at'])) {
            $this->finishedAt = $data['finished_at'];
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
            CurrencyEnum::fromArray($data['currency']),
            $data['started_at'],
            $data['finished_at']
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
     * Gets startedAt
     *
     * @return string
     */
    public function getStartedAt()
    {
        return $this->startedAt;
    }

    /**
     * Gets finishedAt
     *
     * @return string
     */
    public function getFinishedAt()
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
        $data = [];
        
        if (isset($this->value)) {
            $data['value'] = $this->value;
        }
        if (isset($this->currency)) {
            $data['currency'] = $this->currency;
        }
        if (isset($this->startedAt)) {
            $data['started_at'] = $this->startedAt;
        }
        if (isset($this->finishedAt)) {
            $data['finished_at'] = $this->finishedAt;
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
