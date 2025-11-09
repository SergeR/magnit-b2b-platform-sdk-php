<?php
/**
 * Order - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * Order - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class Order implements \JsonSerializable
{
    private string $originalOrderId;
    private string $storeCode;
    private ?OrderStatus $status;
    private ?Cart $cart;
    private ?OrderCollect $collect;
    private ?OrderPrice $price;
    private ?string $comment;

    /**
     * Constructor
     *
     * @param string $originalOrderId
     * @param string $storeCode
     * @param OrderStatus|null $status
     * @param Cart|null $cart
     * @param OrderCollect|null $collect
     * @param OrderPrice|null $price
     * @param string|null $comment
     */
    public function __construct(
        string $originalOrderId,
        string $storeCode,
        ?OrderStatus $status = null,
        ?Cart $cart = null,
        ?OrderCollect $collect = null,
        ?OrderPrice $price = null,
        ?string $comment = null
    ) {
        $this->originalOrderId = $originalOrderId;
        $this->storeCode = $storeCode;
        $this->status = $status;
        $this->cart = $cart;
        $this->collect = $collect;
        $this->price = $price;
        $this->comment = $comment;
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
            $data['original_order_id'],
            $data['store_code'],
            isset($data['status']) ? OrderStatus::fromArray($data['status']) : null,
            isset($data['cart']) ? Cart::fromArray($data['cart']) : null,
            isset($data['collect']) ? OrderCollect::fromArray($data['collect']) : null,
            isset($data['price']) ? OrderPrice::fromArray($data['price']) : null,
            $data['comment'] ?? null
        );
    }

    /**
     * Gets originalOrderId
     *
     * @return string
     */
    public function getOriginalOrderId(): string
    {
        return $this->originalOrderId;
    }

    /**
     * Gets storeCode
     *
     * @return string
     */
    public function getStoreCode(): string
    {
        return $this->storeCode;
    }

    /**
     * Gets status
     *
     * @return OrderStatus|null
     */
    public function getStatus(): ?OrderStatus
    {
        return $this->status;
    }

    /**
     * Gets cart
     *
     * @return Cart|null
     */
    public function getCart(): ?Cart
    {
        return $this->cart;
    }

    /**
     * Gets collect
     *
     * @return OrderCollect|null
     */
    public function getCollect(): ?OrderCollect
    {
        return $this->collect;
    }

    /**
     * Gets price
     *
     * @return OrderPrice|null
     */
    public function getPrice(): ?OrderPrice
    {
        return $this->price;
    }

    /**
     * Gets comment
     *
     * @return string|null
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = [
            'original_order_id' => $this->originalOrderId,
            'store_code' => $this->storeCode,
        ];
        
        if ($this->status !== null) {
            $data['status'] = $this->status->toArray();
        }
        if ($this->cart !== null) {
            $data['cart'] = $this->cart->toArray();
        }
        if ($this->collect !== null) {
            $data['collect'] = $this->collect->toArray();
        }
        if ($this->price !== null) {
            $data['price'] = $this->price->toArray();
        }
        if ($this->comment !== null) {
            $data['comment'] = $this->comment;
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
}
