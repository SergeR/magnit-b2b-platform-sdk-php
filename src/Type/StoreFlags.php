<?php
/**
 * StoreFlags - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * StoreFlags - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class StoreFlags implements \JsonSerializable
{
    /**
     * @var bool
     */
    private $alcohol;

    /**
     * @var bool
     */
    private $pickup;

            /**
     * Constructor
     */
    public function __construct(
        bool $alcohol,
        bool $pickup
    ) {
        $this->alcohol = $alcohol;
        $this->pickup = $pickup;
    }
        if (isset($data['pickup'])) {
            $this->pickup = $data['pickup'];
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
            $data['alcohol'],
            $data['pickup']
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
     * Gets alcohol
     *
     * @return bool
     */
    public function getAlcohol()
    {
        return $this->alcohol;
    }

    /**
     * Gets pickup
     *
     * @return bool
     */
    public function getPickup()
    {
        return $this->pickup;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = [];
        
        if (isset($this->alcohol)) {
            $data['alcohol'] = $this->alcohol;
        }
        if (isset($this->pickup)) {
            $data['pickup'] = $this->pickup;
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
