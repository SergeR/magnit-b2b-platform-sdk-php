<?php
/**
 * ExternalSellerCategoryDto - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * ExternalSellerCategoryDto - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class ExternalSellerCategoryDto implements \JsonSerializable
{
    /**
     * @var int
     */
    private int $categoryId;

    /**
     * @var string
     */
    private string $categoryStringPath;

    /**
     * @var string
     */
    private string $categoryTitle;

    /**
     * Constructor
     */
    public function __construct(
        int $categoryId,
        string $categoryStringPath,
        string $categoryTitle
    ) {
        $this->categoryId = $categoryId;
        $this->categoryStringPath = $categoryStringPath;
        $this->categoryTitle = $categoryTitle;
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
            $data['categoryStringPath'],
            $data['categoryTitle']
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
     * Gets categoryStringPath
     *
     * @return string
     */
    public function getCategoryStringPath(): string
    {
        return $this->categoryStringPath;
    }

    /**
     * Gets categoryTitle
     *
     * @return string
     */
    public function getCategoryTitle(): string
    {
        return $this->categoryTitle;
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
            'categoryStringPath' => $this->categoryStringPath,
            'categoryTitle' => $this->categoryTitle,
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
