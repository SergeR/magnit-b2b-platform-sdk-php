<?php
/**
 * ProductPrice - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

declare(strict_types=1);

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * ProductPrice - Цена товара
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class ProductPrice implements \JsonSerializable
{
    private BasePrice $original;

    /**
     * Constructor
     *
     * @param BasePrice $original Оригинальная цена
     */
    public function __construct(BasePrice $original)
    {
        $this->original = $original;
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
            BasePrice::fromArray($data['original'])
        );
    }

    /**
     * Gets original
     *
     * @return BasePrice
     */
    public function getOriginal(): BasePrice
    {
        return $this->original;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'original' => $this->original->toArray(),
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
