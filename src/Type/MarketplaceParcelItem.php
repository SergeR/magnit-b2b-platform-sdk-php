<?php
/**
 * MarketplaceParcelItem - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * MarketplaceParcelItem - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class MarketplaceParcelItem implements \JsonSerializable
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
     * @var MarketplaceSkuIdentifiers[]
     */
    private array $identifiers;

    /**
     * Constructor
     */
    public function __construct(
        int $skuId,
        int $quantity,
        array $identifiers
    ) {
        $this->skuId = $skuId;
        $this->quantity = $quantity;
        $this->identifiers = $identifiers;
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
            $data['quantity'],
            isset($data['identifiers']) ? array_map(fn($item) => MarketplaceSkuIdentifiers::fromArray($item),
                $data['identifiers']) : []
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
     * Gets identifiers
     *
     * @return MarketplaceSkuIdentifiers[]
     */
    public function getIdentifiers(): array
    {
        return $this->identifiers;
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
            'identifiers' => array_map(fn($item) => $item->jsonSerialize(), $this->identifiers),
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
