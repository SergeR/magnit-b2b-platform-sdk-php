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
    private $status;

    /**
     * @var ClaimStatus
     */
    private $claimStatus;

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
        if (isset($data['claim_status'])) {
            $this->claimStatus = $data['claim_status'];
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
            $data['status'],
            ClaimStatus::fromArray($data['claim_status'])
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
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Gets claimStatus
     *
     * @return ClaimStatus
     */
    public function getClaimStatus()
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
        $data = [];
        
        if (isset($this->status)) {
            $data['status'] = $this->status;
        }
        if (isset($this->claimStatus)) {
            $data['claim_status'] = $this->claimStatus;
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
