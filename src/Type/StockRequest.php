<?php
/**
 * StockRequest - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * StockRequest - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class StockRequest implements \JsonSerializable
{
    /**
     * @var StockDto[]
     */
    private array $stocks;

    /**
     * Constructor
     */
    public function __construct(
        array $stocks
    ) {
        $this->stocks = $stocks;
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
            isset($data['stocks']) ? array_map(fn($item) => StockDto::fromArray($item), $data['stocks']) : []
        );
    }

    /**
     * Gets stocks
     *
     * @return StockDto[]
     */
    public function getStocks(): array
    {
        return $this->stocks;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'stocks' => array_map(fn($item) => $item->jsonSerialize(), $this->stocks),
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
