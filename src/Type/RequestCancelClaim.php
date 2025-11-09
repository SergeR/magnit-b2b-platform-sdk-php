<?php
/**
 * RequestCancelClaim - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

declare(strict_types=1);

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * RequestCancelClaim - Запрос на отмену заявки
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class RequestCancelClaim implements \JsonSerializable
{
    private string $claimId;
    private CancelByPartnerReason $cancelReason;

    /**
     * Constructor
     *
     * @param string $claimId ID заявки
     * @param CancelByPartnerReason $cancelReason Причина отмены
     */
    public function __construct(string $claimId, CancelByPartnerReason $cancelReason)
    {
        $this->claimId = $claimId;
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
            $data['claim_id'] ?? '',
            CancelByPartnerReason::fromArray($data['cancel_reason'] ?? [])
        );
    }

    /**
     * Gets claimId
     *
     * @return string
     */
    public function getClaimId(): string
    {
        return $this->claimId;
    }

    /**
     * Gets cancelReason
     *
     * @return CancelByPartnerReason
     */
    public function getCancelReason(): CancelByPartnerReason
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
            'claim_id' => $this->claimId,
            'cancel_reason' => $this->cancelReason->toArray(),
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
