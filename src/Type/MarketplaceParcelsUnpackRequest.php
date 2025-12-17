<?php
/**
 * MarketplaceParcelsUnpackRequest - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * MarketplaceParcelsUnpackRequest - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class MarketplaceParcelsUnpackRequest implements \JsonSerializable
{
    /**
     * @var string
     */
    private string $parcelId;

    /**
     * Constructor
     */
    public function __construct(
        string $parcelId
    ) {
        $this->parcelId = $parcelId;
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
            $data['parcelId']
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
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'parcelId' => $this->parcelId,
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
