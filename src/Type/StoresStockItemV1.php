<?php
/**
 * StoresStockItemV1 - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * StoresStockItemV1 - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class StoresStockItemV1 implements \JsonSerializable
{
    /**
     * @var string
     */
    private $goodId;

    /**
     * @var float
     */
    private $quantity;

            /**
     * Constructor
     */
    public function __construct(
        string $goodId,
        float $quantity
    ) {
        $this->goodId = $goodId;
        $this->quantity = $quantity;
    }
        if (isset($data['quantity'])) {
            $this->quantity = $data['quantity'];
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
            $data['good_id'],
            $data['quantity']
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
     * Gets goodId
     *
     * @return string
     */
    public function getGoodId()
    {
        return $this->goodId;
    }

    /**
     * Gets quantity
     *
     * @return float
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = [];
        
        if (isset($this->goodId)) {
            $data['good_id'] = $this->goodId;
        }
        if (isset($this->quantity)) {
            $data['quantity'] = $this->quantity;
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
