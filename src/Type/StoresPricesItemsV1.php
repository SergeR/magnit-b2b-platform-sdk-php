<?php
/**
 * StoresPricesItemsV1 - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * StoresPricesItemsV1 - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class StoresPricesItemsV1 implements \JsonSerializable
{
    /**
     * @var StoresPricesItemV1[]
     */
    private array $items;

    /**
     * Constructor
     */
    public function __construct(
        array $items
    ) {
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
            isset($data['items']) ? array_map(fn($item) => StoresPricesItemV1::fromArray($item), $data['items']) : []
        );
    }

    /**
     * Gets items
     *
     * @return StoresPricesItemV1[]
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
