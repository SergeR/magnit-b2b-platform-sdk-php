<?php
/**
 * ResponsePushForwardClaim - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * ResponsePushForwardClaim - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class ResponsePushForwardClaim implements \JsonSerializable
{
    /**
     * @var string
     */
    private string $status;

    /**
     * @var ClaimStatus
     */
    private ClaimStatus $claimStatus;

    /**
     * Constructor
     */
    public function __construct(
        string $status,
        ClaimStatus $claimStatus
    ) {
        $this->status = $status;
        $this->claimStatus = $claimStatus;
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
            $data['status'],
            ClaimStatus::fromArray($data['claimStatus'])
        );
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
     * Gets claimStatus
     *
     * @return ClaimStatus
     */
    public function getClaimStatus(): ClaimStatus
    {
        return $this->claimStatus;
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
            'claimStatus' => $this->claimStatus,
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
