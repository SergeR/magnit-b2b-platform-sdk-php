<?php
/**
 * MarketplaceShipmentDocumentsRequest - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * MarketplaceShipmentDocumentsRequest - Immutable DTO
 *
 * Запрос на получение документов по отгрузке
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class MarketplaceShipmentDocumentsRequest implements \JsonSerializable
{
    /**
     * @var string Идентификатор отгрузки
     */
    private string $shipmentId;

    /**
     * @var string Тип запрашиваемого документа
     */
    private string $documentType;

    /**
     * Допустимые типы документов
     */
    public const DOCUMENT_TYPE_ACT_OF_ACCEPTANCE = 'act_of_acceptance';
    public const DOCUMENT_TYPE_ACT_OF_MISMATCH = 'act_of_mismatch';
    public const DOCUMENT_TYPE_DELIVERY_NOTE = 'delivery_note';

    /**
     * Constructor
     *
     * @param string $shipmentId Идентификатор отгрузки
     * @param string $documentType Тип документа (act_of_acceptance, act_of_mismatch, delivery_note)
     * @throws \InvalidArgumentException
     */
    public function __construct(string $shipmentId, string $documentType)
    {
        $this->validateDocumentType($documentType);
        
        $this->shipmentId = $shipmentId;
        $this->documentType = $documentType;
    }

    /**
     * Создать из массива
     *
     * @param array $data
     * @return self
     * @throws \InvalidArgumentException
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['shipment_id'] ?? $data['shipmentId'],
            $data['document_type'] ?? $data['documentType']
        );
    }

    /**
     * Валидация типа документа
     *
     * @param string $documentType
     * @throws \InvalidArgumentException
     */
    private function validateDocumentType(string $documentType): void
    {
        $allowedTypes = [
            self::DOCUMENT_TYPE_ACT_OF_ACCEPTANCE,
            self::DOCUMENT_TYPE_ACT_OF_MISMATCH,
            self::DOCUMENT_TYPE_DELIVERY_NOTE,
        ];

        if (!in_array($documentType, $allowedTypes, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Invalid document type "%s". Allowed types: %s',
                    $documentType,
                    implode(', ', $allowedTypes)
                )
            );
        }
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
            'shipment_id' => $this->shipmentId,
            'document_type' => $this->documentType,
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
