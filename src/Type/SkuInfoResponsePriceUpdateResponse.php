<?php
/**
 * SkuInfoResponsePriceUpdateResponse - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * SkuInfoResponsePriceUpdateResponse - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class SkuInfoResponsePriceUpdateResponse implements \JsonSerializable
{
    /**
     * @var PriceUpdateResponse[]
     */
    private array $result;

    /**
     * Constructor
     */
    public function __construct(
        array $result
    ) {
        $this->result = $result;
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
            isset($data['result']) ? array_map(fn($item) => PriceUpdateResponse::fromArray($item), $data['result']) : []
        );
    }

    /**
     * Gets result
     *
     * @return PriceUpdateResponse[]
     */
    public function getResult(): array
    {
        return $this->result;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'result' => array_map(fn($item) => $item->jsonSerialize(), $this->result),
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
