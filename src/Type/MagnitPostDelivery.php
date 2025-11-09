<?php
/**
 * MagnitPostDelivery - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * MagnitPostDelivery - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class MagnitPostDelivery implements \JsonSerializable
{
    private string $pickupPointKey;
    private Recipient $recipient;

    /**
     * Constructor
     *
     * @param string $pickupPointKey Ключ пункта выдачи
     * @param Recipient $recipient Получатель
     */
    public function __construct(string $pickupPointKey, Recipient $recipient)
    {
        $this->pickupPointKey = $pickupPointKey;
        $this->recipient = $recipient;
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
            $data['pickup_point_key'],
            Recipient::fromArray($data['recipient'])
        );
    }

    /**
     * Gets pickupPointKey
     *
     * @return string
     */
    public function getPickupPointKey(): string
    {
        return $this->pickupPointKey;
    }

    /**
     * Gets recipient
     *
     * @return Recipient
     */
    public function getRecipient(): Recipient
    {
        return $this->recipient;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'pickup_point_key' => $this->pickupPointKey,
            'recipient' => $this->recipient->toArray(),
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
