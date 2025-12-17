<?php
/**
 * StoresStocksItemsV1 - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * StoresStocksItemsV1 - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class StoresStocksItemsV1 implements \JsonSerializable
{
    /**
     * @var int
     */
    private int $timestamp;

    /**
     * @var StoresStockItemV1[]
     */
    private array $items;

    /**
     * Constructor
     */
    public function __construct(
        int $timestamp,
        array $items
    ) {
        $this->timestamp = $timestamp;
        $this->items = $items;
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
            $data['timestamp'],
            isset($data['items']) ? array_map(fn($item) => StoresStockItemV1::fromArray($item), $data['items']) : []
        );
    }

    /**
     * Gets timestamp
     *
     * @return int
     */
    public function getTimestamp(): int
    {
        return $this->timestamp;
    }

    /**
     * Gets items
     *
     * @return StoresStockItemV1[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'timestamp' => $this->timestamp,
            'items' => array_map(fn($item) => $item->jsonSerialize(), $this->items),
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
