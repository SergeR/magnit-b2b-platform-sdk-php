<?php
/**
 * MarketplaceShipmentGetDocumentsRequest - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * MarketplaceShipmentGetDocumentsRequest - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class MarketplaceShipmentGetDocumentsRequest implements \JsonSerializable
{
    /**
     * @var string
     */
    private string $shipmentId;

    /**
     * @var string
     */
    private string $documentType;

    /**
     * Constructor
     */
    public function __construct(
        string $shipmentId,
        string $documentType
    ) {
        $this->shipmentId = $shipmentId;
        $this->documentType = $documentType;
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
            $data['shipmentId'],
            $data['documentType']
        );
    }

    /**
     * Gets shipmentId
     *
     * @return string
     */
    public function getShipmentId(): string
    {
        return $this->shipmentId;
    }

    /**
     * Gets documentType
     *
     * @return string
     */
    public function getDocumentType(): string
    {
        return $this->documentType;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'shipmentId' => $this->shipmentId,
            'documentType' => $this->documentType,
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
