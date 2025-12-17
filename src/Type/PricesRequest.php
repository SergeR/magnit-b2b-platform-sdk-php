<?php
/**
 * PricesRequest - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * PricesRequest - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class PricesRequest implements \JsonSerializable
{
    /**
     * @var PriceDto[]
     */
    private array $prices;

    /**
     * Constructor
     */
    public function __construct(
        array $prices
    ) {
        $this->prices = $prices;
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
            isset($data['prices']) ? array_map(fn($item) => PriceDto::fromArray($item), $data['prices']) : []
        );
    }

    /**
     * Gets prices
     *
     * @return PriceDto[]
     */
    public function getPrices(): array
    {
        return $this->prices;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'prices' => array_map(fn($item) => $item->jsonSerialize(), $this->prices),
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
