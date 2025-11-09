<?php
/**
 * ResponseCancelClaim - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

declare(strict_types=1);

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * ResponseCancelClaim - Ответ на отмену заявки
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class ResponseCancelClaim implements \JsonSerializable
{
    private string $claimId;

    /**
     * Constructor
     *
     * @param string $claimId ID отмененной заявки
     */
    public function __construct(string $claimId)
    {
        $this->claimId = $claimId;
    }

    /**
     * Создать из массива
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self($data['claim_id'] ?? '');
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
     * Alias для getClaimId
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->claimId;
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
