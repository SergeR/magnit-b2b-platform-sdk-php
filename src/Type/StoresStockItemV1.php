<?php
/**
 * StoresStockItemV1 - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * StoresStockItemV1 - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class StoresStockItemV1 implements \JsonSerializable
{
    /**
     * @var string
     */
    private string $goodId;

    /**
     * @var float
     */
    private float $quantity;

    /**
     * Constructor
     */
    public function __construct(
        string $goodId,
        float $quantity
    ) {
        $this->goodId = $goodId;
        $this->quantity = $quantity;
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
            $data['goodId'],
            $data['quantity']
        );
    }

    /**
     * Gets goodId
     *
     * @return string
     */
    public function getGoodId(): string
    {
        return $this->goodId;
    }

    /**
     * Gets quantity
     *
     * @return float
     */
    public function getQuantity(): float
    {
        return $this->quantity;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'goodId' => $this->goodId,
            'quantity' => $this->quantity,
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
