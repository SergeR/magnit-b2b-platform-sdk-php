<?php
/**
 * SkuInfoResponseProductDeleteResponse - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * SkuInfoResponseProductDeleteResponse - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class SkuInfoResponseProductDeleteResponse implements \JsonSerializable
{
    /**
     * @var ProductDeleteResponse[]
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
            isset($data['result']) ? array_map(fn($item) => ProductDeleteResponse::fromArray($item),
                $data['result']) : []
        );
    }

    /**
     * Gets result
     *
     * @return ProductDeleteResponse[]
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
