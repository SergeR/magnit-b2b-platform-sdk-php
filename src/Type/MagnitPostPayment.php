<?php
/**
 * MagnitPostPayment - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * MagnitPostPayment - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class MagnitPostPayment implements \JsonSerializable
{
    private float $declaredValue;

    /**
     * Constructor
     *
     * @param float $declaredValue Объявленная стоимость (копейки)
     */
    public function __construct(float $declaredValue)
    {
        $this->declaredValue = $declaredValue;
    }

    /**
     * Создать из массива
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self($data['declared_value']);
    }

    /**
     * Gets declaredValue
     *
     * @return float
     */
    public function getDeclaredValue(): float
    {
        return $this->declaredValue;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'declared_value' => $this->declaredValue,
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
