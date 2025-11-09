<?php
/**
 * DeliveryTimeSlot - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * DeliveryTimeSlot - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class DeliveryTimeSlot implements \JsonSerializable
{
    /**
     * @var string
     */
    private $from;

    /**
     * @var string
     */
    private $to;

            /**
     * Constructor
     */
    public function __construct(
        string $from,
        string $to
    ) {
        $this->from = $from;
        $this->to = $to;
    }
        if (isset($data['to'])) {
            $this->to = $data['to'];
        }
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
            $data['to']
        );
    }

    /**
     * Создать из JSON
     *
     * @param string $json
     * @return self
     */
    public static function fromJson(string $json): self
    {
        $data = json_decode($json, true);
        return new self($data ?? []);
    }

    /**
     * Gets from
     *
     * @return string
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * Gets to
     *
     * @return string
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = [];
        
        if (isset($this->from)) {
            $data['from'] = $this->from;
        }
        if (isset($this->to)) {
            $data['to'] = $this->to;
        }
        
        return $data;
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

    /**
     * Преобразовать в JSON строку
     *
     * @return string
     */
    public function toJson(): string
    {
        return json_encode($this->toArray());
    }

    /**
     * Строковое представление
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
