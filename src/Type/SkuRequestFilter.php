<?php
/**
 * SkuRequestFilter - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * SkuRequestFilter - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class SkuRequestFilter implements \JsonSerializable
{
    /**
     * @var int
     */
    private int $categoryId;

    /**
     * @var int
     */
    private int $shopId;

    /**
     * Constructor
     */
    public function __construct(
        int $categoryId,
        int $shopId
    ) {
        $this->categoryId = $categoryId;
        $this->shopId = $shopId;
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
            $data['categoryId'],
            $data['shopId']
        );
    }

    /**
     * Gets categoryId
     *
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    /**
     * Gets shopId
     *
     * @return int
     */
    public function getShopId(): int
    {
        return $this->shopId;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'categoryId' => $this->categoryId,
            'shopId' => $this->shopId,
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
