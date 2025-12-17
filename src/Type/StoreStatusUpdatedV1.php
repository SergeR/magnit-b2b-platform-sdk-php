<?php
/**
 * StoreStatusUpdatedV1 - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * StoreStatusUpdatedV1 - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class StoreStatusUpdatedV1 implements \JsonSerializable
{
    /**
     * @var StoreStatusUpdatedItemV1
     */
    private StoreStatusUpdatedItemV1 $items;

    /**
     * Constructor
     */
    public function __construct(
        StoreStatusUpdatedItemV1 $items
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
            StoreStatusUpdatedItemV1::fromArray($data['items'])
        );
    }

    /**
     * Gets items
     *
     * @return StoreStatusUpdatedItemV1
     */
    public function getItems(): StoreStatusUpdatedItemV1
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
            'items' => $this->items,
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
