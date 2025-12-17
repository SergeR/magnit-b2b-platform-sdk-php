<?php
/**
 * EventPayload - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * EventPayload - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class EventPayload implements \JsonSerializable
{
    /**
     * @var string
     */
    private string $storeCode;

    /**
     * @var StoreCollectQueueUpdatedItemV1
     */
    private StoreCollectQueueUpdatedItemV1 $items;

    /**
     * Constructor
     */
    public function __construct(
        string $storeCode,
        StoreCollectQueueUpdatedItemV1 $items
    ) {
        $this->storeCode = $storeCode;
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
            $data['storeCode'],
            StoreCollectQueueUpdatedItemV1::fromArray($data['items'])
        );
    }

    /**
     * Gets storeCode
     *
     * @return string
     */
    public function getStoreCode(): string
    {
        return $this->storeCode;
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
            'storeCode' => $this->storeCode,
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
