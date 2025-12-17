<?php
/**
 * MarketplaceShipmentGetDocumentsResponse - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * MarketplaceShipmentGetDocumentsResponse - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class MarketplaceShipmentGetDocumentsResponse implements \JsonSerializable
{
    /**
     * @var string
     */
    private string $fileContent;

    /**
     * Constructor
     */
    public function __construct(
        string $fileContent
    ) {
        $this->fileContent = $fileContent;
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
            $data['fileContent']
        );
    }

    /**
     * Gets fileContent
     *
     * @return string
     */
    public function getFileContent(): string
    {
        return $this->fileContent;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'fileContent' => $this->fileContent,
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
