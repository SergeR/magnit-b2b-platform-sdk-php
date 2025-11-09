<?php
/**
 * ClaimState - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * ClaimState - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class ClaimState implements \JsonSerializable
{
    /**
     * @var ClaimStatus
     */
    private $status;

    /**
     * @var CancelReason
     */
    private $cancelReason;

            /**
     * Constructor
     */
    public function __construct(
        ClaimStatus $status,
        CancelReason $cancelReason
    ) {
        $this->status = $status;
        $this->cancelReason = $cancelReason;
    }
        if (isset($data['cancel_reason'])) {
            $this->cancelReason = $data['cancel_reason'];
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
            ClaimStatus::fromArray($data['status']),
            CancelReason::fromArray($data['cancel_reason'])
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
     * Gets status
     *
     * @return ClaimStatus
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Gets cancelReason
     *
     * @return CancelReason
     */
    public function getCancelReason()
    {
        return $this->cancelReason;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = [];
        
        if (isset($this->status)) {
            $data['status'] = $this->status;
        }
        if (isset($this->cancelReason)) {
            $data['cancel_reason'] = $this->cancelReason;
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
