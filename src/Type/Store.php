<?php
/**
 * Store - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * Store - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class Store implements \JsonSerializable
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $code;

    /**
     * @var StoreFlags
     */
    private $flags;

            /**
     * Constructor
     */
    public function __construct(
        string $name,
        string $code,
        StoreFlags $flags
    ) {
        $this->name = $name;
        $this->code = $code;
        $this->flags = $flags;
    }
        if (isset($data['code'])) {
            $this->code = $data['code'];
        }
        if (isset($data['flags'])) {
            $this->flags = $data['flags'];
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
            $data['code'],
            StoreFlags::fromArray($data['flags'])
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
     * Gets code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Gets flags
     *
     * @return StoreFlags
     */
    public function getFlags()
    {
        return $this->flags;
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
        if (isset($this->code)) {
            $data['code'] = $this->code;
        }
        if (isset($this->flags)) {
            $data['flags'] = $this->flags;
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
