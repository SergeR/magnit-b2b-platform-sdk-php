<?php
/**
 * MarketplaceOrderItem - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * MarketplaceOrderItem - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class MarketplaceOrderItem implements \JsonSerializable
{
    /**
     * @var int
     */
    private $skuId;

    /**
     * @var int
     */
    private $quantity;

    /**
     * @var int
     */
    private $canceledQuantity;

    /**
     * @var MarketplaceOrderItemFinancialData
     */
    private $financialData;

            /**
     * Constructor
     */
    public function __construct(
        int $skuId,
        int $quantity,
        int $canceledQuantity,
        MarketplaceOrderItemFinancialData $financialData
    ) {
        $this->skuId = $skuId;
        $this->quantity = $quantity;
        $this->canceledQuantity = $canceledQuantity;
        $this->financialData = $financialData;
    }
        if (isset($data['quantity'])) {
            $this->quantity = $data['quantity'];
        }
        if (isset($data['canceled_quantity'])) {
            $this->canceledQuantity = $data['canceled_quantity'];
        }
        if (isset($data['financial_data'])) {
            $this->financialData = $data['financial_data'];
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
            $data['sku_id'],
            $data['quantity'],
            $data['canceled_quantity'],
            MarketplaceOrderItemFinancialData::fromArray($data['financial_data'])
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
     * Gets skuId
     *
     * @return int
     */
    public function getSkuId()
    {
        return $this->skuId;
    }

    /**
     * Gets quantity
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Gets canceledQuantity
     *
     * @return int
     */
    public function getCanceledQuantity()
    {
        return $this->canceledQuantity;
    }

    /**
     * Gets financialData
     *
     * @return MarketplaceOrderItemFinancialData
     */
    public function getFinancialData()
    {
        return $this->financialData;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = [];
        
        if (isset($this->skuId)) {
            $data['sku_id'] = $this->skuId;
        }
        if (isset($this->quantity)) {
            $data['quantity'] = $this->quantity;
        }
        if (isset($this->canceledQuantity)) {
            $data['canceled_quantity'] = $this->canceledQuantity;
        }
        if (isset($this->financialData)) {
            $data['financial_data'] = $this->financialData;
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
