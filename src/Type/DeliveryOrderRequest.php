<?php
/**
 * DeliveryOrderRequest - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * DeliveryOrderRequest - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class DeliveryOrderRequest implements \JsonSerializable
{
    /**
     * @var string
     */
    private $customerOrderId;

    /**
     * @var MagnitPostPayment
     */
    private $payment;

    /**
     * @var MagnitPostDelivery
     */
    private $delivery;

    /**
     * @var ParcelCharacteristic
     */
    private $characteristic;

            /**
     * Constructor
     */
    public function __construct(
        string $customerOrderId,
        MagnitPostPayment $payment,
        MagnitPostDelivery $delivery,
        ParcelCharacteristic $characteristic
    ) {
        $this->customerOrderId = $customerOrderId;
        $this->payment = $payment;
        $this->delivery = $delivery;
        $this->characteristic = $characteristic;
    }
        if (isset($data['payment'])) {
            $this->payment = $data['payment'];
        }
        if (isset($data['delivery'])) {
            $this->delivery = $data['delivery'];
        }
        if (isset($data['characteristic'])) {
            $this->characteristic = $data['characteristic'];
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
            $data['customer_order_id'],
            MagnitPostPayment::fromArray($data['payment']),
            MagnitPostDelivery::fromArray($data['delivery']),
            ParcelCharacteristic::fromArray($data['characteristic'])
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
     * Gets customerOrderId
     *
     * @return string
     */
    public function getCustomerOrderId()
    {
        return $this->customerOrderId;
    }

    /**
     * Gets payment
     *
     * @return MagnitPostPayment
     */
    public function getPayment()
    {
        return $this->payment;
    }

    /**
     * Gets delivery
     *
     * @return MagnitPostDelivery
     */
    public function getDelivery()
    {
        return $this->delivery;
    }

    /**
     * Gets characteristic
     *
     * @return ParcelCharacteristic
     */
    public function getCharacteristic()
    {
        return $this->characteristic;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = [];
        
        if (isset($this->customerOrderId)) {
            $data['customerOrderId'] = $this->customerOrderId;
        }
        if (isset($this->payment)) {
            $data['payment'] = $this->payment;
        }
        if (isset($this->delivery)) {
            $data['delivery'] = $this->delivery;
        }
        if (isset($this->characteristic)) {
            $data['characteristic'] = $this->characteristic;
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
