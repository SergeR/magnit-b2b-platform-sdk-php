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
    private string $oldArticle;

    /**
     * @var string
     */
    private string $newArticle;

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

    /**
     * Создать из массива
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['oldArticle'],
            $data['newArticle']
        );
    }

    /**
     * Gets oldArticle
     *
     * @return string
     */
    public function getOldArticle(): string
    {
        return $this->oldArticle;
    }

    /**
     * Gets newArticle
     *
     * @return string
     */
    public function getNewArticle(): string
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
        return [
            'oldArticle' => $this->oldArticle,
            'newArticle' => $this->newArticle,
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
