<?php
/**
 * StoreBlockedEvent - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * StoreBlockedEvent - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class StoreBlockedEvent implements \JsonSerializable
{
    /**
     * @var string
     */
    private string $storeCode;

    /**
     * Constructor
     */
    public function __construct(
        string $storeCode
    ) {
        $this->storeCode = $storeCode;
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
            $data['storeCode']
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
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'storeCode' => $this->storeCode,
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
