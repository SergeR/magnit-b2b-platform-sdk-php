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
    private $storeCode;

    /**
     * @var StoreCollectQueueUpdatedItemV1
     */
    private $items;

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
        if (isset($data['items'])) {
            $this->items = $data['items'];
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
            $data['store_code'],
            StoreCollectQueueUpdatedItemV1::fromArray($data['items'])
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
     * Gets storeCode
     *
     * @return string
     */
    public function getStoreCode()
    {
        return $this->storeCode;
    }

    /**
     * Gets items
     *
     * @return StoreCollectQueueUpdatedItemV1
     */
    public function getItems()
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
        $data = [];
        
        if (isset($this->storeCode)) {
            $data['store_code'] = $this->storeCode;
        }
        if (isset($this->items)) {
            $data['items'] = $this->items;
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
