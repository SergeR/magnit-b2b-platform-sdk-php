<?php
/**
 * DayWorkHours - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

declare(strict_types=1);

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * DayWorkHours - Часы работы в определенный день
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class DayWorkHours implements \JsonSerializable
{
    private string $day;
    private string $from;
    private string $till;

    /**
     * Constructor
     *
     * @param string $day День недели (MON, TUE, WED, THU, FRI, SAT, SUN)
     * @param string $from Время начала работы (HH:MM)
     * @param string $till Время окончания работы (HH:MM)
     */
    public function __construct(string $day, string $from, string $till)
    {
        $this->day = $day;
        $this->from = $from;
        $this->till = $till;
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
            $data['day'],
            $data['from'],
            $data['till']
        );
    }

    /**
     * Gets day
     *
     * @return string
     */
    public function getDay(): string
    {
        return $this->day;
    }

    /**
     * Gets from
     *
     * @return string
     */
    public function getFrom(): string
    {
        return $this->from;
    }

    /**
     * Gets till
     *
     * @return string
     */
    public function getTill(): string
    {
        return $this->till;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'day' => $this->day,
            'from' => $this->from,
            'till' => $this->till,
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
