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
    private string $goodId;

    /**
     * @var StoresBasePriceV1
     */
    private StoresBasePriceV1 $base;

    /**
     * @var StoresActionPriceV1
     */
    private StoresActionPriceV1 $action;

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

    /**
     * Создать из массива
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['goodId'],
            StoresBasePriceV1::fromArray($data['base']),
            StoresActionPriceV1::fromArray($data['action'])
        );
    }

    /**
     * Gets goodId
     *
     * @return string
     */
    public function getGoodId(): string
    {
        return $this->goodId;
    }

    /**
     * Gets base
     *
     * @return StoresBasePriceV1
     */
    public function getBase(): StoresBasePriceV1
    {
        return $this->base;
    }

    /**
     * Gets action
     *
     * @return StoresActionPriceV1
     */
    public function getAction(): StoresActionPriceV1
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
        return [
            'goodId' => $this->goodId,
            'base' => $this->base,
            'action' => $this->action,
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
