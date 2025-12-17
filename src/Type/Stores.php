<?php
/**
 * Stores - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * Stores - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class Stores implements \JsonSerializable
{
    /**
     * @var Store[]
     */
    private array $stores;

    /**
     * Constructor
     */
    public function __construct(
        array $stores
    ) {
        $this->stores = $stores;
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
            isset($data['stores']) ? array_map(fn($item) => Store::fromArray($item), $data['stores']) : []
        );
    }

    /**
     * Gets stores
     *
     * @return Store[]
     */
    public function getStores(): array
    {
        return $this->stores;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'stores' => array_map(fn($item) => $item->jsonSerialize(), $this->stores),
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
