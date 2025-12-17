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
    private string $originalOrderId;

    /**
     * @var string
     */
    private string $storeCode;

    /**
     * @var Customer
     */
    private Customer $customer;

    /**
     * @var OrderRequestDelivery
     */
    private OrderRequestDelivery $delivery;

    /**
     * @var Collect
     */
    private Collect $collect;

    /**
     * @var CartRequest
     */
    private CartRequest $cart;

    /**
     * @var OrderPrice
     */
    private OrderPrice $price;

    /**
     * @var string
     */
    private string $comment;

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

    /**
     * Создать из массива
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['originalOrderId'],
            $data['storeCode'],
            Customer::fromArray($data['customer']),
            OrderRequestDelivery::fromArray($data['delivery']),
            Collect::fromArray($data['collect']),
            CartRequest::fromArray($data['cart']),
            OrderPrice::fromArray($data['price']),
            $data['comment']
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
     * Gets customer
     *
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    /**
     * Gets delivery
     *
     * @return OrderRequestDelivery
     */
    public function getDelivery(): OrderRequestDelivery
    {
        return $this->delivery;
    }

    /**
     * Gets collect
     *
     * @return Collect
     */
    public function getCollect(): Collect
    {
        return $this->collect;
    }

    /**
     * Gets cart
     *
     * @return CartRequest
     */
    public function getCart(): CartRequest
    {
        return $this->cart;
    }

    /**
     * Gets price
     *
     * @return OrderPrice
     */
    public function getPrice(): OrderPrice
    {
        return $this->price;
    }

    /**
     * Gets comment
     *
     * @return string
     */
    public function getComment(): string
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
        return [
            'originalOrderId' => $this->originalOrderId,
            'storeCode' => $this->storeCode,
            'customer' => $this->customer,
            'delivery' => $this->delivery,
            'collect' => $this->collect,
            'cart' => $this->cart,
            'price' => $this->price,
            'comment' => $this->comment,
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
