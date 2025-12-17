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
    private string $parcelId;

    /**
     * @var string
     */
    private string $orderId;

    /**
     * @var MarketplaceParcelStatus
     */
    private MarketplaceParcelStatus $status;

    /**
     * @var string
     */
    private string $barcode;

    /**
     * @var \DateTime
     */
    private \DateTime $cutoffTime;

    /**
     * @var MarketplaceParcelItem[]
     */
    private array $items;

    /**
     * Constructor
     */
    public function __construct(
        string $parcelId,
        string $orderId,
        MarketplaceParcelStatus $status,
        string $barcode,
        \DateTime $cutoffTime,
        array $items
    ) {
        $this->parcelId = $parcelId;
        $this->orderId = $orderId;
        $this->status = $status;
        $this->barcode = $barcode;
        $this->cutoffTime = $cutoffTime;
        $this->items = $items;
    }

    /**
     * Создать из массива
     *
     * @param array $data
     * @return self
     * @throws \Exception
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['parcelId'],
            $data['orderId'],
            MarketplaceParcelStatus::fromArray($data['status']),
            $data['barcode'],
            new \DateTime($data['cutoffTime']),
            isset($data['items']) ? array_map(fn($item) => MarketplaceParcelItem::fromArray($item), $data['items']) : []
        );
    }

    /**
     * Gets parcelId
     *
     * @return string
     */
    public function getParcelId(): string
    {
        return $this->parcelId;
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
     * Gets status
     *
     * @return MarketplaceParcelStatus
     */
    public function getStatus(): MarketplaceParcelStatus
    {
        return $this->status;
    }

    /**
     * Gets barcode
     *
     * @return string
     */
    public function getBarcode(): string
    {
        return $this->barcode;
    }

    /**
     * Gets cutoffTime
     *
     * @return \DateTime
     */
    public function getCutoffTime(): \DateTime
    {
        return $this->cutoffTime;
    }

    /**
     * Gets items
     *
     * @return MarketplaceParcelItem[]
     */
    public function getItems(): array
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
        return [
            'parcelId' => $this->parcelId,
            'orderId' => $this->orderId,
            'status' => $this->status,
            'barcode' => $this->barcode,
            'cutoffTime' => $this->cutoffTime->format(\DateTimeInterface::ATOM),
            'items' => array_map(fn($item) => $item->jsonSerialize(), $this->items),
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
