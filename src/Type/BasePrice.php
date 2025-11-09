<?php
/**
 * BasePrice - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

declare(strict_types=1);

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * BasePrice - Базовая цена
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class BasePrice implements \JsonSerializable
{
    private int $value;

    /**
     * Constructor
     *
     * @param int $value Цена (копейки)
     */
    public function __construct(int $value)
    {
        $this->value = $value;
    }

    /**
     * Создать из массива
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self($data['value']);
    }

    /**
     * Gets value
     *
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'value' => $this->value,
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
