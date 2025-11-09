<?php
/**
 * MarketplaceShipmentListResponse - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * MarketplaceShipmentListResponse - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class MarketplaceShipmentListResponse implements \JsonSerializable
{
    /**
     * @var string
     */
    private $nextPageToken;

    /**
     * @var MarketplaceShipment[]
     */
    private $shipments;

            /**
     * Constructor
     */
    public function __construct(
        string $nextPageToken,
        MarketplaceShipment[] $shipments
    ) {
        $this->nextPageToken = $nextPageToken;
        $this->shipments = $shipments;
    }
        if (isset($data['shipments'])) {
            $this->shipments = $data['shipments'];
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
            $data['next_page_token'],
            isset($data['shipments']) ? array_map(fn($item) => MarketplaceShipment::fromArray($item), $data['shipments']) : []
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
     * Gets nextPageToken
     *
     * @return string
     */
    public function getNextPageToken()
    {
        return $this->nextPageToken;
    }

    /**
     * Gets shipments
     *
     * @return MarketplaceShipment[]
     */
    public function getShipments()
    {
        return $this->shipments;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = [];
        
        if (isset($this->nextPageToken)) {
            $data['next_page_token'] = $this->nextPageToken;
        }
        if (isset($this->shipments)) {
            $data['shipments'] = array_map(function($item) {
                return $item instanceof \JsonSerializable ? $item->jsonSerialize() : $item;
            }, $this->shipments);
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
