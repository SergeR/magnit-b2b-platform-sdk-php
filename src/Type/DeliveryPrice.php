<?php
/**
 * DeliveryPrice - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * DeliveryPrice - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class DeliveryPrice implements \JsonSerializable
{
    /**
     * @var DeliveryBasePrice
     */
    private DeliveryBasePrice $base;

    /**
     * Constructor
     */
    public function __construct(
        DeliveryBasePrice $base
    ) {
        $this->base = $base;
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
            DeliveryBasePrice::fromArray($data['base'])
        );
    }

    /**
     * Gets base
     *
     * @return DeliveryBasePrice
     */
    public function getBase(): DeliveryBasePrice
    {
        return $this->base;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'base' => $this->base,
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
