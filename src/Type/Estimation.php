<?php
/**
 * Estimation - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * Estimation - Оценка доставки
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class Estimation implements \JsonSerializable
{
    private int $distance;
    private int $cost;
    private \DateTime $estimatedArrival;
    private \DateTime $expectedCourierArrival;

    /**
     * Constructor
     *
     * @param int $distance Расстояние (метры)
     * @param int $cost Стоимость (копейки)
     * @param \DateTime $estimatedArrival Ожидаемое время прибытия
     * @param \DateTime $expectedCourierArrival Ожидаемое время прибытия курьера
     */
    public function __construct(
        int $distance,
        int $cost,
        \DateTime $estimatedArrival,
        \DateTime $expectedCourierArrival
    ) {
        $this->distance = $distance;
        $this->cost = $cost;
        $this->estimatedArrival = $estimatedArrival;
        $this->expectedCourierArrival = $expectedCourierArrival;
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
            $data['distance'],
            $data['cost'],
            new \DateTime($data['estimated_arrival']),
            new \DateTime($data['expected_courier_arrival'])
        );
    }

    /**
     * Gets distance
     *
     * @return int
     */
    public function getDistance(): int
    {
        return $this->distance;
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
     * Gets estimatedArrival
     *
     * @return \DateTime
     */
    public function getEstimatedArrival(): \DateTime
    {
        return $this->estimatedArrival;
    }

    /**
     * Gets expectedCourierArrival
     *
     * @return \DateTime
     */
    public function getExpectedCourierArrival(): \DateTime
    {
        return $this->expectedCourierArrival;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'distance' => $this->distance,
            'cost' => $this->cost,
            'estimated_arrival' => $this->estimatedArrival->format(\DateTime::ATOM),
            'expected_courier_arrival' => $this->expectedCourierArrival->format(\DateTime::ATOM),
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
