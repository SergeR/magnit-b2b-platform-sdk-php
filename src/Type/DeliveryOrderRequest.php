<?php
/**
 * DeliveryOrderRequest - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

declare(strict_types=1);

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
    private string $customerOrderId;

    /**
     * @var MagnitPostPayment
     */
    private MagnitPostPayment $payment;

    /**
     * @var MagnitPostDelivery
     */
    private MagnitPostDelivery $delivery;

    /**
     * @var ParcelCharacteristic
     */
    private ParcelCharacteristic $characteristic;

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

    /**
     * Создать из массива
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['customerOrderId'],
            MagnitPostPayment::fromArray($data['payment']),
            MagnitPostDelivery::fromArray($data['delivery']),
            ParcelCharacteristic::fromArray($data['characteristic'])
        );
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
            'customerOrderId' => $this->customerOrderId,
            'payment' => $this->payment,
            'delivery' => $this->delivery,
            'characteristic' => $this->characteristic,
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
