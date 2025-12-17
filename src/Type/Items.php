<?php
/**
 * Items - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * Items - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class Items implements \JsonSerializable
{
    /**
     * @var int
     */
    private int $weight;

    /**
     * @var int
     */
    private int $cost;

    /**
     * Constructor
     */
    public function __construct(
        int $weight,
        int $cost
    ) {
        $this->weight = $weight;
        $this->cost = $cost;
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
            $data['weight'],
            $data['cost']
        );
    }

    /**
     * Gets weight
     *
     * @return int
     */
    public function getWeight(): int
    {
        return $this->weight;
    }

    /**
     * Gets cost
     *
     * @return int
     */
    public function getCost(): int
    {
        return $this->cost;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'weight' => $this->weight,
            'cost' => $this->cost,
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
