<?php
/**
 * MarketplaceParcelFullInfo - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * MarketplaceParcelFullInfo - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class MarketplaceParcelFullInfo implements \JsonSerializable
{
    /**
     * @var string
     */
    private $parcelId;

    /**
     * @var string
     */
    private $orderId;

    /**
     * @var MarketplaceParcelStatus
     */
    private $status;

    /**
     * @var string
     */
    private $barcode;

    /**
     * @var \DateTime
     */
    private $cutoffTime;

    /**
     * @var MarketplaceParcelItem[]
     */
    private $items;

            /**
     * Constructor
     */
    public function __construct(
        string $parcelId,
        string $orderId,
        MarketplaceParcelStatus $status,
        string $barcode,
        \DateTime $cutoffTime,
        MarketplaceParcelItem[] $items
    ) {
        $this->parcelId = $parcelId;
        $this->orderId = $orderId;
        $this->status = $status;
        $this->barcode = $barcode;
        $this->cutoffTime = $cutoffTime;
        $this->items = $items;
    }
        if (isset($data['order_id'])) {
            $this->orderId = $data['order_id'];
        }
        if (isset($data['status'])) {
            $this->status = $data['status'];
        }
        if (isset($data['barcode'])) {
            $this->barcode = $data['barcode'];
        }
        if (isset($data['cutoff_time'])) {
            $this->cutoffTime = $data['cutoff_time'];
        }
        if (isset($data['items'])) {
            $this->items = $data['items'];
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
            $data['parcel_id'],
            $data['order_id'],
            MarketplaceParcelStatus::fromArray($data['status']),
            $data['barcode'],
            \DateTime::fromArray($data['cutoff_time']),
            isset($data['items']) ? array_map(fn($item) => MarketplaceParcelItem::fromArray($item), $data['items']) : []
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
     * Gets parcelId
     *
     * @return string
     */
    public function getParcelId()
    {
        return $this->parcelId;
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
     * Gets status
     *
     * @return MarketplaceParcelStatus
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Gets barcode
     *
     * @return string
     */
    public function getBarcode()
    {
        return $this->barcode;
    }

    /**
     * Gets cutoffTime
     *
     * @return \DateTime
     */
    public function getCutoffTime()
    {
        return $this->cutoffTime;
    }

    /**
     * Gets items
     *
     * @return MarketplaceParcelItem[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = [];
        
        if (isset($this->parcelId)) {
            $data['parcel_id'] = $this->parcelId;
        }
        if (isset($this->orderId)) {
            $data['order_id'] = $this->orderId;
        }
        if (isset($this->status)) {
            $data['status'] = $this->status;
        }
        if (isset($this->barcode)) {
            $data['barcode'] = $this->barcode;
        }
        if (isset($this->cutoffTime)) {
            $data['cutoff_time'] = $this->cutoffTime instanceof \JsonSerializable ? $this->cutoffTime->jsonSerialize() : $this->cutoffTime;
        }
        if (isset($this->items)) {
            $data['items'] = array_map(function($item) {
                return $item instanceof \JsonSerializable ? $item->jsonSerialize() : $item;
            }, $this->items);
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
