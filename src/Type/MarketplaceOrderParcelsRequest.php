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
    private string $orderId;

    /**
     * @var MarketplaceCreateParcel[]
     */
    private array $parcels;

    /**
     * Constructor
     */
    public function __construct(
        string $orderId,
        array $parcels
    ) {
        $this->orderId = $orderId;
        $this->parcels = $parcels;
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
            $data['orderId'],
            isset($data['parcels']) ? array_map(fn($item) => MarketplaceCreateParcel::fromArray($item),
                $data['parcels']) : []
        );
    }

    /**
     * Gets orderId
     *
     * @return string
     */
    public function getOrderId(): string
    {
        return $this->orderId;
    }

    /**
     * Gets parcels
     *
     * @return MarketplaceCreateParcel[]
     */
    public function getParcels(): array
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
        return [
            'orderId' => $this->orderId,
            'parcels' => array_map(fn($item) => $item->jsonSerialize(), $this->parcels),
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
