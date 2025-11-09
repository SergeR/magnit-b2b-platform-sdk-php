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
    private $skuId;

    /**
     * @var MarketplaceSkuIdentifiers[]
     */
    private $identifiers;

            /**
     * Constructor
     */
    public function __construct(
        int $skuId,
        MarketplaceSkuIdentifiers[] $identifiers
    ) {
        $this->skuId = $skuId;
        $this->identifiers = $identifiers;
    }
        if (isset($data['identifiers'])) {
            $this->identifiers = $data['identifiers'];
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
            $data['sku_id'],
            isset($data['identifiers']) ? array_map(fn($item) => MarketplaceSkuIdentifiers::fromArray($item), $data['identifiers']) : []
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
     * Gets skuId
     *
     * @return int
     */
    public function getSkuId()
    {
        return $this->skuId;
    }

    /**
     * Gets identifiers
     *
     * @return MarketplaceSkuIdentifiers[]
     */
    public function getIdentifiers()
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
        $data = [];
        
        if (isset($this->skuId)) {
            $data['sku_id'] = $this->skuId;
        }
        if (isset($this->identifiers)) {
            $data['identifiers'] = array_map(function($item) {
                return $item instanceof \JsonSerializable ? $item->jsonSerialize() : $item;
            }, $this->identifiers);
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
