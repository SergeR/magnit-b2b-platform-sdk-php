<?php
/**
 * RequestCancelClaim - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * RequestCancelClaim - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class RequestCancelClaim implements \JsonSerializable
{
    /**
     * @var string
     */
    private $claimId;

    /**
     * @var CancelByPartnerReason
     */
    private $cancelReason;

            /**
     * Constructor
     */
    public function __construct(
        string $claimId,
        CancelByPartnerReason $cancelReason
    ) {
        $this->claimId = $claimId;
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
            $data['claim_id'],
            CancelByPartnerReason::fromArray($data['cancel_reason'])
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
     * Gets claimId
     *
     * @return string
     */
    public function getClaimId()
    {
        return $this->claimId;
    }

    /**
     * Gets cancelReason
     *
     * @return CancelByPartnerReason
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
        
        if (isset($this->claimId)) {
            $data['claim_id'] = $this->claimId;
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
