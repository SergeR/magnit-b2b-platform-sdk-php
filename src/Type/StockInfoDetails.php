<?php
/**
 * StockInfoDetails - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * StockInfoDetails - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class StockInfoDetails implements \JsonSerializable
{
    /**
     * @var int
     */
    private $reserved;

    /**
     * @var int
     */
    private $stock;

    /**
     * @var string
     */
    private $type;

            /**
     * Constructor
     */
    public function __construct(
        int $reserved,
        int $stock,
        string $type
    ) {
        $this->reserved = $reserved;
        $this->stock = $stock;
        $this->type = $type;
    }
        if (isset($data['stock'])) {
            $this->stock = $data['stock'];
        }
        if (isset($data['type'])) {
            $this->type = $data['type'];
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
            $data['reserved'],
            $data['stock'],
            $data['type']
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
     * Gets reserved
     *
     * @return int
     */
    public function getReserved()
    {
        return $this->reserved;
    }

    /**
     * Gets stock
     *
     * @return int
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Gets type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = [];
        
        if (isset($this->reserved)) {
            $data['reserved'] = $this->reserved;
        }
        if (isset($this->stock)) {
            $data['stock'] = $this->stock;
        }
        if (isset($this->type)) {
            $data['type'] = $this->type;
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
