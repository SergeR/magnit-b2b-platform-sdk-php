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
    private int $skuId;

    /**
     * @var int
     */
    private int $quantity;

    /**
     * @var int
     */
    private int $canceledQuantity;

    /**
     * @var MarketplaceOrderItemFinancialData
     */
    private MarketplaceOrderItemFinancialData $financialData;

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

    /**
     * Создать из массива
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['skuId'],
            $data['quantity'],
            $data['canceledQuantity'],
            MarketplaceOrderItemFinancialData::fromArray($data['financialData'])
        );
    }

    /**
     * Gets skuId
     *
     * @return int
     */
    public function getSkuId(): int
    {
        return $this->skuId;
    }

    /**
     * Gets quantity
     *
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * Gets canceledQuantity
     *
     * @return int
     */
    public function getCanceledQuantity(): int
    {
        return $this->canceledQuantity;
    }

    /**
     * Gets financialData
     *
     * @return MarketplaceOrderItemFinancialData
     */
    public function getFinancialData(): MarketplaceOrderItemFinancialData
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
        return [
            'skuId' => $this->skuId,
            'quantity' => $this->quantity,
            'canceledQuantity' => $this->canceledQuantity,
            'financialData' => $this->financialData,
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
