<?php

namespace SergeR\MagintB2BPlatformSDK\Type;

class DeliveryOrder implements \JsonSerializable
{
    /**
     * @var string|null
     * @readonly
     */
    public ?string $trackingNumber;

    /**
     * @readonly
     * @var string|null
     */
    public ?string $customerOrderId;

    /**
     * @readonly
     * @var string|null
     * @enum ('NEW', 'CREATED', 'DELIVERING_STARTED', 'ACCEPTED_AT_POINT', 'IN_COURIER_DELIVERY', 'ISSUED', 'DESTROYED', 'ACCEPTED_AT_WAREHOUSE', 'REMOVED', 'WAITING_RETURN', 'RETURN_INITIATED', 'RETURN_SEND_TO_WAREHOUSE', 'POSSIBLY_DEFECTED', 'DEFECTED', 'RETURN_ACCEPTED_AT_WAREHOUSE', 'RETURNED_TO_PROVIDER', 'CANCELED_BY_PROVIDER', 'ACCEPTED_AT_CUSTOMS')
     */
    public ?string $status;

    /**
     * @readonly
     * @var MagnitPostPayment|null
     */
    public ?MagnitPostPayment $payment;

    /**
     * @readonly
     * @var MagnitPostDelivery|null
     */
    public ?MagnitPostDelivery $delivery;

    /**
     * @readonly
     * @var ParcelCharacteristic|null
     */
    public ?ParcelCharacteristic $characteristic;

    /**
     * @readonly
     * @var string|null
     */
    public ?string $pickupCode;

    /**
     * @readonly
     * @var string|null
     */
    public ?string $externalOrderId;

    /**
     * @var string Дата/время в формате (RFC3339 формат : %Y-%M-%DT%h:%m:%sZ)
     * @readonly
     */
    public string $createdAt;

    /**
     * @param string|null $trackingNumber
     * @param string|null $customerOrderId
     * @param string|null $status
     * @param MagnitPostPayment|null $payment
     * @param MagnitPostDelivery|null $delivery
     * @param ParcelCharacteristic|null $characteristic
     * @param string|null $pickupCode
     * @param string|null $externalOrderId
     * @param string $createdAt
     */
    public function __construct(
        ?string $trackingNumber,
        ?string $customerOrderId,
        ?string $status,
        ?MagnitPostPayment $payment,
        ?MagnitPostDelivery $delivery,
        ?ParcelCharacteristic $characteristic,
        ?string $pickupCode,
        ?string $externalOrderId,
        string $createdAt
    ) {
        $this->trackingNumber = $trackingNumber;
        $this->customerOrderId = $customerOrderId;
        $this->status = $status;
        $this->payment = $payment;
        $this->delivery = $delivery;
        $this->characteristic = $characteristic;
        $this->pickupCode = $pickupCode;
        $this->externalOrderId = $externalOrderId;
        $this->createdAt = $createdAt;
    }


    /**
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['trackingNumber'] ?? null,
            $data['customerOrderId'] ?? null,
            $data['status'] ?? null,
            isset($data['payment']) ? MagnitPostPayment::fromArray($data['payment']) : null,
            isset($data['delivery']) ? MagnitPostDelivery::fromArray($data['delivery']) : null,
            isset($data['characteristic']) ? ParcelCharacteristic::fromArray($data['characteristic']) : null,
            $data['pickupCode'] ?? null,
            $data['externalOrderId'] ?? null,
            $data['createdAt']
        );
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'trackingNumber' => $this->trackingNumber,
            'customerOrderId' => $this->customerOrderId,
            'status' => $this->status,
            'payment' => $this->payment !== null ? $this->payment->toArray() : null,
            'delivery' => $this->delivery !== null ? $this->delivery->toArray() : null,
            'characteristic' => $this->characteristic !== null ? $this->characteristic->toArray() : null,
            'pickupCode' => $this->pickupCode,
            'externalOrderId' => $this->externalOrderId,
            'createdAt' => $this->createdAt,
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

    public function getTrackingNumber(): ?string
    {
        return $this->trackingNumber;
    }

    public function getCustomerOrderId(): ?string
    {
        return $this->customerOrderId;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function getPayment(): ?MagnitPostPayment
    {
        return $this->payment;
    }

    public function getDelivery(): ?MagnitPostDelivery
    {
        return $this->delivery;
    }

    public function getCharacteristic(): ?ParcelCharacteristic
    {
        return $this->characteristic;
    }

    public function getPickupCode(): ?string
    {
        return $this->pickupCode;
    }

    public function getExternalOrderId(): ?string
    {
        return $this->externalOrderId;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }
}
