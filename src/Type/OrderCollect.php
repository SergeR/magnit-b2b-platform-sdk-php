<?php
/**
 * OrderCollect - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * OrderCollect - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class OrderCollect implements \JsonSerializable
{
    /**
     * @var string
     */
    private string $expectedAt;

    /**
     * Constructor
     */
    public function __construct(
        string $expectedAt
    ) {
        $this->expectedAt = $expectedAt;
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
            $data['expectedAt']
        );
    }

    /**
     * Gets expectedAt
     *
     * @return string
     */
    public function getExpectedAt(): string
    {
        return $this->expectedAt;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'expectedAt' => $this->expectedAt,
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
