<?php
/**
 * OrderRequest - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * OrderRequest - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class OrderRequest implements \JsonSerializable
{
    /**
     * @var string
     */
    private $originalOrderId;

    /**
     * @var string
     */
    private $storeCode;

    /**
     * @var Customer
     */
    private $customer;

    /**
     * @var OrderRequestDelivery
     */
    private $delivery;

    /**
     * @var Collect
     */
    private $collect;

    /**
     * @var CartRequest
     */
    private $cart;

    /**
     * @var OrderPrice
     */
    private $price;

    /**
     * @var string
     */
    private $comment;

            /**
     * Constructor
     */
    public function __construct(
        string $originalOrderId,
        string $storeCode,
        Customer $customer,
        OrderRequestDelivery $delivery,
        Collect $collect,
        CartRequest $cart,
        OrderPrice $price,
        string $comment
    ) {
        $this->originalOrderId = $originalOrderId;
        $this->storeCode = $storeCode;
        $this->customer = $customer;
        $this->delivery = $delivery;
        $this->collect = $collect;
        $this->cart = $cart;
        $this->price = $price;
        $this->comment = $comment;
    }
        if (isset($data['store_code'])) {
            $this->storeCode = $data['store_code'];
        }
        if (isset($data['customer'])) {
            $this->customer = $data['customer'];
        }
        if (isset($data['delivery'])) {
            $this->delivery = $data['delivery'];
        }
        if (isset($data['collect'])) {
            $this->collect = $data['collect'];
        }
        if (isset($data['cart'])) {
            $this->cart = $data['cart'];
        }
        if (isset($data['price'])) {
            $this->price = $data['price'];
        }
        if (isset($data['comment'])) {
            $this->comment = $data['comment'];
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
            $data['original_order_id'],
            $data['store_code'],
            Customer::fromArray($data['customer']),
            OrderRequestDelivery::fromArray($data['delivery']),
            Collect::fromArray($data['collect']),
            CartRequest::fromArray($data['cart']),
            OrderPrice::fromArray($data['price']),
            $data['comment']
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
     * Gets originalOrderId
     *
     * @return string
     */
    public function getOriginalOrderId()
    {
        return $this->originalOrderId;
    }

    /**
     * Gets storeCode
     *
     * @return string
     */
    public function getStoreCode()
    {
        return $this->storeCode;
    }

    /**
     * Gets customer
     *
     * @return Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Gets delivery
     *
     * @return OrderRequestDelivery
     */
    public function getDelivery()
    {
        return $this->delivery;
    }

    /**
     * Gets collect
     *
     * @return Collect
     */
    public function getCollect()
    {
        return $this->collect;
    }

    /**
     * Gets cart
     *
     * @return CartRequest
     */
    public function getCart()
    {
        return $this->cart;
    }

    /**
     * Gets price
     *
     * @return OrderPrice
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Gets comment
     *
     * @return string
     */
    public function getComment()
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
        $data = [];
        
        if (isset($this->originalOrderId)) {
            $data['original_order_id'] = $this->originalOrderId;
        }
        if (isset($this->storeCode)) {
            $data['store_code'] = $this->storeCode;
        }
        if (isset($this->customer)) {
            $data['customer'] = $this->customer;
        }
        if (isset($this->delivery)) {
            $data['delivery'] = $this->delivery;
        }
        if (isset($this->collect)) {
            $data['collect'] = $this->collect;
        }
        if (isset($this->cart)) {
            $data['cart'] = $this->cart;
        }
        if (isset($this->price)) {
            $data['price'] = $this->price;
        }
        if (isset($this->comment)) {
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
