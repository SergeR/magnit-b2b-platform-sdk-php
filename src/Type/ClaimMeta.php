<?php
/**
 * ClaimMeta
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * ClaimMeta Class - Упрощенная версия DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class ClaimMeta implements \JsonSerializable
{
    /**
     * @var array
     */
    private array $data;

    /**
     * Constructor
     *
     * @param array $data Ассоциативный массив данных
     */
    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    /**
     * Создать из массива
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self($data);
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return $this->data;
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
