<?php
/**
 * Contact - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * Contact - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class Contact implements \JsonSerializable
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $extraPhone;

            /**
     * Constructor
     */
    public function __construct(
        string $name,
        string $phone,
        string $extraPhone
    ) {
        $this->name = $name;
        $this->phone = $phone;
        $this->extraPhone = $extraPhone;
    }
        if (isset($data['phone'])) {
            $this->phone = $data['phone'];
        }
        if (isset($data['extra_phone'])) {
            $this->extraPhone = $data['extra_phone'];
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
            $data['name'],
            $data['phone'],
            $data['extra_phone']
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
     * Gets name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Gets phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Gets extraPhone
     *
     * @return string
     */
    public function getExtraPhone()
    {
        return $this->extraPhone;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = [];
        
        if (isset($this->name)) {
            $data['name'] = $this->name;
        }
        if (isset($this->phone)) {
            $data['phone'] = $this->phone;
        }
        if (isset($this->extraPhone)) {
            $data['extra_phone'] = $this->extraPhone;
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
