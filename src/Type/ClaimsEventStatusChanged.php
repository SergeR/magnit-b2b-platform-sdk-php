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
    private $newStatus;

    /**
     * @var ClaimsEventStatusChangedPayload
     */
    private $payload;

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
        if (isset($data['payload'])) {
            $this->payload = $data['payload'];
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
            ClaimStatus::fromArray($data['new_status']),
            ClaimsEventStatusChangedPayload::fromArray($data['payload'])
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
     * Gets newStatus
     *
     * @return ClaimStatus
     */
    public function getNewStatus()
    {
        return $this->newStatus;
    }

    /**
     * Gets payload
     *
     * @return ClaimsEventStatusChangedPayload
     */
    public function getPayload()
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
        $data = [];
        
        if (isset($this->newStatus)) {
            $data['new_status'] = $this->newStatus;
        }
        if (isset($this->payload)) {
            $data['payload'] = $this->payload;
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
