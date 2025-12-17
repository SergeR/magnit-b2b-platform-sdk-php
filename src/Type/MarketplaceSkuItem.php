<?php
/**
 * MarketplaceSkuItem - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * MarketplaceSkuItem - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class MarketplaceSkuItem implements \JsonSerializable
{
    /**
     * @var int
     */
    private int $skuId;

    /**
     * @var int
     */
    private int $quantity;

    /**
     * Constructor
     */
    public function __construct(
        int $skuId,
        int $quantity
    ) {
        $this->skuId = $skuId;
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
            $data['skuId'],
            $data['quantity']
        );
    }

    /**
     * Gets skuId
     *
     * @return int
     */
    public function getSkuId(): int
    {
        return $this->skuId;
    }

    /**
     * Gets quantity
     *
     * @return int
     */
    public function getQuantity(): int
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
            'skuId' => $this->skuId,
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
