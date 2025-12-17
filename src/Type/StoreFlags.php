<?php
/**
 * StoreFlags - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * StoreFlags - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class StoreFlags implements \JsonSerializable
{
    /**
     * @var bool
     */
    private bool $alcohol;

    /**
     * @var bool
     */
    private bool $pickup;

    /**
     * Constructor
     */
    public function __construct(
        bool $alcohol,
        bool $pickup
    ) {
        $this->alcohol = $alcohol;
        $this->pickup = $pickup;
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
            $data['alcohol'],
            $data['pickup']
        );
    }

    /**
     * Gets alcohol
     *
     * @return bool
     */
    public function getAlcohol(): bool
    {
        return $this->alcohol;
    }

    /**
     * Gets pickup
     *
     * @return bool
     */
    public function getPickup(): bool
    {
        return $this->pickup;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'alcohol' => $this->alcohol,
            'pickup' => $this->pickup,
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
