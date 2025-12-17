<?php
/**
 * DeliveryTime - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * DeliveryTime - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class DeliveryTime implements \JsonSerializable
{
    /**
     * @var string
     */
    private string $expectedDatetime;

    /**
     * Constructor
     */
    public function __construct(
        string $expectedDatetime
    ) {
        $this->expectedDatetime = $expectedDatetime;
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
            $data['expectedDatetime']
        );
    }

    /**
     * Gets expectedDatetime
     *
     * @return string
     */
    public function getExpectedDatetime(): string
    {
        return $this->expectedDatetime;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'expectedDatetime' => $this->expectedDatetime,
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
