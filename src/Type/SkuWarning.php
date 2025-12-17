<?php
/**
 * SkuWarning - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * SkuWarning - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class SkuWarning implements \JsonSerializable
{
    /**
     * @var SkuWarningAttribute[]
     */
    private array $attributes;

    /**
     * @var string
     */
    private string $sellerSkuId;

    /**
     * @var string
     */
    private string $status;

    /**
     * Constructor
     */
    public function __construct(
        array $attributes,
        string $sellerSkuId,
        string $status
    ) {
        $this->attributes = $attributes;
        $this->sellerSkuId = $sellerSkuId;
        $this->status = $status;
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
            isset($data['attributes']) ? array_map(fn($item) => SkuWarningAttribute::fromArray($item),
                $data['attributes']) : [],
            $data['sellerSkuId'],
            $data['status']
        );
    }

    /**
     * Gets attributes
     *
     * @return SkuWarningAttribute[]
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * Gets sellerSkuId
     *
     * @return string
     */
    public function getSellerSkuId(): string
    {
        return $this->sellerSkuId;
    }

    /**
     * Gets status
     *
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'attributes' => array_map(fn($item) => $item->jsonSerialize(), $this->attributes),
            'sellerSkuId' => $this->sellerSkuId,
            'status' => $this->status,
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
