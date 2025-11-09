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
    private $categoryId;

    /**
     * @var string
     */
    private $categoryStringPath;

    /**
     * @var string
     */
    private $categoryTitle;

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
        if (isset($data['category_string_path'])) {
            $this->categoryStringPath = $data['category_string_path'];
        }
        if (isset($data['category_title'])) {
            $this->categoryTitle = $data['category_title'];
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
            $data['category_id'],
            $data['category_string_path'],
            $data['category_title']
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
     * Gets categoryId
     *
     * @return int
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * Gets categoryStringPath
     *
     * @return string
     */
    public function getCategoryStringPath()
    {
        return $this->categoryStringPath;
    }

    /**
     * Gets categoryTitle
     *
     * @return string
     */
    public function getCategoryTitle()
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
        $data = [];
        
        if (isset($this->categoryId)) {
            $data['category_id'] = $this->categoryId;
        }
        if (isset($this->categoryStringPath)) {
            $data['category_string_path'] = $this->categoryStringPath;
        }
        if (isset($this->categoryTitle)) {
            $data['category_title'] = $this->categoryTitle;
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
