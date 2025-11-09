<?php
/**
 * Cart - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

declare(strict_types=1);

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * Cart - Корзина
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class Cart implements \JsonSerializable
{
    /** @var CartItem[] */
    private array $items;

    /**
     * Constructor
     *
     * @param CartItem[] $items Товары в корзине
     */
    public function __construct(array $items)
    {
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
        $items = [];
        if (isset($data['items']) && is_array($data['items'])) {
            foreach ($data['items'] as $item) {
                $items[] = CartItem::fromArray($item);
            }
        }
        
        return new self($items);
    }

    /**
     * Gets items
     *
     * @return CartItem[]
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
            'items' => array_map(fn($item) => $item->toArray(), $this->items),
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
