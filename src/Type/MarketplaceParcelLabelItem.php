<?php
/**
 * MarketplaceParcelLabelItem - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * MarketplaceParcelLabelItem - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class MarketplaceParcelLabelItem implements \JsonSerializable
{
    /**
     * @var string
     */
    private $parcelId;

    /**
     * @var string
     */
    private $barcode;

            /**
     * Constructor
     */
    public function __construct(
        string $parcelId,
        string $barcode
    ) {
        $this->parcelId = $parcelId;
        $this->barcode = $barcode;
    }
        if (isset($data['barcode'])) {
            $this->barcode = $data['barcode'];
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
            $data['barcode']
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
     * Gets barcode
     *
     * @return string
     */
    public function getBarcode()
    {
        return $this->barcode;
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
        if (isset($this->barcode)) {
            $data['barcode'] = $this->barcode;
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
