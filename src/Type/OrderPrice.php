<?php
/**
 * OrderPrice - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * OrderPrice - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class OrderPrice implements \JsonSerializable
{
    /**
     * @var OrderTotalPrice
     */
    private OrderTotalPrice $total;

    /**
     * Constructor
     */
    public function __construct(
        OrderTotalPrice $total
    ) {
        $this->total = $total;
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
            OrderTotalPrice::fromArray($data['total'])
        );
    }

    /**
     * Gets total
     *
     * @return OrderTotalPrice
     */
    public function getTotal(): OrderTotalPrice
    {
        return $this->total;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'total' => $this->total,
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
