<?php
/**
 * ProductReplacement - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * ProductReplacement - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class ProductReplacement implements \JsonSerializable
{
    /**
     * @var string
     */
    private $oldArticle;

    /**
     * @var string
     */
    private $newArticle;

            /**
     * Constructor
     */
    public function __construct(
        string $oldArticle,
        string $newArticle
    ) {
        $this->oldArticle = $oldArticle;
        $this->newArticle = $newArticle;
    }
        if (isset($data['new_article'])) {
            $this->newArticle = $data['new_article'];
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
            $data['old_article'],
            $data['new_article']
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
     * Gets oldArticle
     *
     * @return string
     */
    public function getOldArticle()
    {
        return $this->oldArticle;
    }

    /**
     * Gets newArticle
     *
     * @return string
     */
    public function getNewArticle()
    {
        return $this->newArticle;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = [];
        
        if (isset($this->oldArticle)) {
            $data['old_article'] = $this->oldArticle;
        }
        if (isset($this->newArticle)) {
            $data['new_article'] = $this->newArticle;
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
