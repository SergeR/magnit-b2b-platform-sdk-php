<?php
/**
 * StoreCollectQueueUpdatedV1 - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * StoreCollectQueueUpdatedV1 - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class StoreCollectQueueUpdatedV1 implements \JsonSerializable
{
    /**
     * @var StoreCollectQueueUpdatedItemV1
     */
    private StoreCollectQueueUpdatedItemV1 $items;

    /**
     * Constructor
     */
    public function __construct(
        StoreCollectQueueUpdatedItemV1 $items
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
            StoreCollectQueueUpdatedItemV1::fromArray($data['items'])
        );
    }

    /**
     * Gets items
     *
     * @return StoreCollectQueueUpdatedItemV1
     */
    public function getItems(): StoreCollectQueueUpdatedItemV1
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
