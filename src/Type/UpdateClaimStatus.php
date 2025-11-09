<?php
/**
 * UpdateClaimStatus - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * UpdateClaimStatus - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class UpdateClaimStatus implements \JsonSerializable
{
    /**
     * @var string
     */
    private $claimId;

    /**
     * @var string
     */
    private $status;

            /**
     * Constructor
     */
    public function __construct(
        string $claimId,
        string $status
    ) {
        $this->claimId = $claimId;
        $this->status = $status;
    }
        if (isset($data['status'])) {
            $this->status = $data['status'];
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
            $data['status']
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
     * Gets status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
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
        if (isset($this->status)) {
            $data['status'] = $this->status;
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
