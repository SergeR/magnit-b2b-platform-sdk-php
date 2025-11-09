<?php
/**
 * DeliveryOrderResponse - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * DeliveryOrderResponse - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class DeliveryOrderResponse implements \JsonSerializable
{
    private string $trackingNumber;
    private string $customerOrderId;
    private string $pickupCode;
    private string $status;
    private MagnitPostPayment $payment;
    private MagnitPostDelivery $delivery;
    private ParcelCharacteristic $characteristic;

    /**
     * Constructor
     *
     * @param string $trackingNumber
     * @param string $customerOrderId
     * @param string $pickupCode
     * @param string $status Статус заказа (NEW, CREATED, DELIVERING_STARTED, и т.д.)
     * @param MagnitPostPayment $payment
     * @param MagnitPostDelivery $delivery
     * @param ParcelCharacteristic $characteristic
     */
    public function __construct(
        string $trackingNumber,
        string $customerOrderId,
        string $pickupCode,
        string $status,
        MagnitPostPayment $payment,
        MagnitPostDelivery $delivery,
        ParcelCharacteristic $characteristic
    ) {
        $this->trackingNumber = $trackingNumber;
        $this->customerOrderId = $customerOrderId;
        $this->pickupCode = $pickupCode;
        $this->status = $status;
        $this->payment = $payment;
        $this->delivery = $delivery;
        $this->characteristic = $characteristic;
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
            $data['tracking_number'],
            $data['customer_order_id'],
            $data['pickup_code'],
            $data['status'],
            MagnitPostPayment::fromArray($data['payment']),
            MagnitPostDelivery::fromArray($data['delivery']),
            ParcelCharacteristic::fromArray($data['characteristic'])
        );
    }

    /**
     * Gets trackingNumber
     *
     * @return string
     */
    public function getTrackingNumber(): string
    {
        return $this->trackingNumber;
    }

    /**
     * Gets customerOrderId
     *
     * @return string
     */
    public function getCustomerOrderId(): string
    {
        return $this->customerOrderId;
    }

    /**
     * Gets pickupCode
     *
     * @return string
     */
    public function getPickupCode(): string
    {
        return $this->pickupCode;
    }

    /**
     * Gets status
     *
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * Gets payment
     *
     * @return MagnitPostPayment
     */
    public function getPayment(): MagnitPostPayment
    {
        return $this->payment;
    }

    /**
     * Gets delivery
     *
     * @return MagnitPostDelivery
     */
    public function getDelivery(): MagnitPostDelivery
    {
        return $this->delivery;
    }

    /**
     * Gets characteristic
     *
     * @return ParcelCharacteristic
     */
    public function getCharacteristic(): ParcelCharacteristic
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
        return [
            'tracking_number' => $this->trackingNumber,
            'customer_order_id' => $this->customerOrderId,
            'pickup_code' => $this->pickupCode,
            'status' => $this->status,
            'payment' => $this->payment->toArray(),
            'delivery' => $this->delivery->toArray(),
            'characteristic' => $this->characteristic->toArray(),
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
