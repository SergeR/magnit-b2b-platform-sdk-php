<?php
/**
 * CategoryCharacteristicsRequest - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * CategoryCharacteristicsRequest - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class CategoryCharacteristicsRequest implements \JsonSerializable
{
    /**
     * @var int[]
     */
    private ?array $categoryIds;

    /**
     * Constructor
     */
    public function __construct(?array $categoryIds)
    {
        $this->categoryIds = $categoryIds;
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
            $data['category_ids']
        );
    }

    /**
     * Gets categoryIds
     *
     * @return int[]
     */
    public function getCategoryIds()
    {
        return $this->categoryIds;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = [];

        if (isset($this->categoryIds)) {
            $data['category_ids'] = $this->categoryIds;
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
}
