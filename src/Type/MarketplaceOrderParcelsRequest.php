<?php
/**
 * MarketplaceOrderParcelsRequest - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * MarketplaceOrderParcelsRequest - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class MarketplaceOrderParcelsRequest implements \JsonSerializable
{
    /**
     * @var string
     */
    private $orderId;

    /**
     * @var MarketplaceCreateParcel[]
     */
    private $parcels;

            /**
     * Constructor
     */
    public function __construct(
        string $orderId,
        MarketplaceCreateParcel[] $parcels
    ) {
        $this->orderId = $orderId;
        $this->parcels = $parcels;
    }
        if (isset($data['parcels'])) {
            $this->parcels = $data['parcels'];
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
            $data['order_id'],
            isset($data['parcels']) ? array_map(fn($item) => MarketplaceCreateParcel::fromArray($item), $data['parcels']) : []
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
     * Gets orderId
     *
     * @return string
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Gets parcels
     *
     * @return MarketplaceCreateParcel[]
     */
    public function getParcels()
    {
        return $this->parcels;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = [];
        
        if (isset($this->orderId)) {
            $data['order_id'] = $this->orderId;
        }
        if (isset($this->parcels)) {
            $data['parcels'] = array_map(function($item) {
                return $item instanceof \JsonSerializable ? $item->jsonSerialize() : $item;
            }, $this->parcels);
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
