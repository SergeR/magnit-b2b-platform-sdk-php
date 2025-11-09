<?php
/**
 * RequestClaimsInfo - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

declare(strict_types=1);

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * RequestClaimsInfo - Запрос информации о заявках
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class RequestClaimsInfo implements \JsonSerializable
{
    /** @var string[] */
    private array $claimIds;

    /**
     * Constructor
     *
     * @param string[] $claimIds Массив ID заявок
     */
    public function __construct(array $claimIds)
    {
        $this->claimIds = $claimIds;
    }

    /**
     * Создать из массива
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self($data['claim_ids'] ?? []);
    }

    /**
     * Gets claimIds
     *
     * @return string[]
     */
    public function getClaimIds(): array
    {
        return $this->claimIds;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'claim_ids' => $this->claimIds,
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
