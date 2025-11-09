<?php
/**
 * ClaimsEventEvent - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

declare(strict_types=1);

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * ClaimsEventEvent - Данные события заявки
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class ClaimsEventEvent implements \JsonSerializable
{
    private string $newStatus;
    private ClaimsEventStatusChangedPayload $payload;

    /**
     * Constructor
     *
     * @param string $newStatus Новый статус (created, accepted, delivery_finished и т.д.)
     * @param ClaimsEventStatusChangedPayload $payload Данные события
     */
    public function __construct(string $newStatus, ClaimsEventStatusChangedPayload $payload)
    {
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
            $data['new_status'] ?? '',
            ClaimsEventStatusChangedPayload::fromArray($data['payload'] ?? [])
        );
    }

    /**
     * Gets newStatus
     *
     * @return string
     */
    public function getNewStatus(): string
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
            'new_status' => $this->newStatus,
            'payload' => $this->payload->toArray(),
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
