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
    private ClaimStatus $status;

    /**
     * @var CancelReason
     */
    private CancelReason $cancelReason;

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
            CancelReason::fromArray($data['cancelReason'])
        );
    }

    /**
     * Gets status
     *
     * @return ClaimStatus
     */
    public function getStatus(): ClaimStatus
    {
        return $this->status;
    }

    /**
     * Gets cancelReason
     *
     * @return CancelReason
     */
    public function getCancelReason(): CancelReason
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
        return [
            'status' => $this->status,
            'cancelReason' => $this->cancelReason,
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
