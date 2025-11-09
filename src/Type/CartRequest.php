<?php
/**
 * CartRequest - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

declare(strict_types=1);

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * CartRequest - Запрос корзины
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class CartRequest implements \JsonSerializable
{
    /** @var CartItemRequest[] */
    private array $items;

    /**
     * Constructor
     *
     * @param CartItemRequest[] $items Товары в корзине
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
                $items[] = CartItemRequest::fromArray($item);
            }
        }
        
        return new self($items);
    }

    /**
     * Gets items
     *
     * @return CartItemRequest[]
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
