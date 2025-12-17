<?php
/**
 * CreateSkuRequest - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * CreateSkuRequest - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class CreateSkuRequest implements \JsonSerializable
{
    /**
     * @var SkuRequest[]
     */
    private array $skuList;

    /**
     * Constructor
     */
    public function __construct(array $skuList)
    {
        $this->skuList = $skuList;
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
            isset($data['skuList']) ? array_map(fn($item) => SkuRequest::fromArray($item), $data['skuList']) : []
        );
    }

    /**
     * Gets skuList
     *
     * @return SkuRequest[]
     */
    public function getSkuList(): array
    {
        return $this->skuList;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'skuList' => array_map(fn($item) => $item->jsonSerialize(), $this->skuList),
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
