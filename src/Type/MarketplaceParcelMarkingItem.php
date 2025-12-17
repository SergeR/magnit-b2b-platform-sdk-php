<?php
/**
 * MarketplaceParcelMarkingItem - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * MarketplaceParcelMarkingItem - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class MarketplaceParcelMarkingItem implements \JsonSerializable
{
    /**
     * @var int
     */
    private int $skuId;

    /**
     * @var MarketplaceSkuIdentifiers[]
     */
    private array $identifiers;

    /**
     * Constructor
     */
    public function __construct(
        int $skuId,
        array $identifiers
    ) {
        $this->skuId = $skuId;
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
