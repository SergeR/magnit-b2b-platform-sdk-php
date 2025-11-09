<?php
/**
 * EstimateOrderResponse - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * EstimateOrderResponse - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class EstimateOrderResponse implements \JsonSerializable
{
    private int $from;
    private int $to;
    private int $cost;

    /**
     * Constructor
     *
     * @param int $from Минимальный срок доставки (дни)
     * @param int $to Максимальный срок доставки (дни)
     * @param int $cost Стоимость доставки (копейки)
     */
    public function __construct(int $from, int $to, int $cost)
    {
        $this->from = $from;
        $this->to = $to;
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
            $data['from'],
            $data['to'],
            $data['cost']
        );
    }

    /**
     * Gets from
     *
     * @return int
     */
    public function getFrom(): int
    {
        return $this->from;
    }

    /**
     * Gets to
     *
     * @return int
     */
    public function getTo(): int
    {
        return $this->to;
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
            'from' => $this->from,
            'to' => $this->to,
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
