<?php
/**
 * ClaimsEventStatusChanged - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * ClaimsEventStatusChanged - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class ClaimsEventStatusChanged implements \JsonSerializable
{
    /**
     * @var ClaimStatus
     */
    private ClaimStatus $newStatus;

    /**
     * @var ClaimsEventStatusChangedPayload
     */
    private ClaimsEventStatusChangedPayload $payload;

    /**
     * Constructor
     */
    public function __construct(
        ClaimStatus $newStatus,
        ClaimsEventStatusChangedPayload $payload
    ) {
        $this->newStatus = $newStatus;
        $this->payload = $payload;
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
            ClaimStatus::fromArray($data['newStatus']),
            ClaimsEventStatusChangedPayload::fromArray($data['payload'])
        );
    }

    /**
     * Gets newStatus
     *
     * @return ClaimStatus
     */
    public function getNewStatus(): ClaimStatus
    {
        return $this->newStatus;
    }

    /**
     * Gets payload
     *
     * @return ClaimsEventStatusChangedPayload
     */
    public function getPayload(): ClaimsEventStatusChangedPayload
    {
        return $this->payload;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'newStatus' => $this->newStatus,
            'payload' => $this->payload,
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
