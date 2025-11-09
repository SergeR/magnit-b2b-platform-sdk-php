<?php
/**
 * StoresPricesItemV1 - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * StoresPricesItemV1 - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class StoresPricesItemV1 implements \JsonSerializable
{
    /**
     * @var string
     */
    private $goodId;

    /**
     * @var StoresBasePriceV1
     */
    private $base;

    /**
     * @var StoresActionPriceV1
     */
    private $action;

            /**
     * Constructor
     */
    public function __construct(
        string $goodId,
        StoresBasePriceV1 $base,
        StoresActionPriceV1 $action
    ) {
        $this->goodId = $goodId;
        $this->base = $base;
        $this->action = $action;
    }
        if (isset($data['base'])) {
            $this->base = $data['base'];
        }
        if (isset($data['action'])) {
            $this->action = $data['action'];
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
            StoresBasePriceV1::fromArray($data['base']),
            StoresActionPriceV1::fromArray($data['action'])
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
     * Gets base
     *
     * @return StoresBasePriceV1
     */
    public function getBase()
    {
        return $this->base;
    }

    /**
     * Gets action
     *
     * @return StoresActionPriceV1
     */
    public function getAction()
    {
        return $this->action;
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
        if (isset($this->base)) {
            $data['base'] = $this->base;
        }
        if (isset($this->action)) {
            $data['action'] = $this->action;
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
