<?php
/**
 * ResponseClaimsInfo - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

declare(strict_types=1);

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * ResponseClaimsInfo - Ответ с информацией о заявках
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class ResponseClaimsInfo implements \JsonSerializable
{
    /** @var Claim[] */
    private array $claims;

    /**
     * Constructor
     *
     * @param Claim[] $claims Массив заявок
     */
    public function __construct(array $claims)
    {
        $this->claims = $claims;
    }

    /**
     * Создать из массива
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        $claims = [];
        if (isset($data['claims']) && is_array($data['claims'])) {
            foreach ($data['claims'] as $item) {
                $claims[] = Claim::fromArray($item);
            }
        }

        return new self($claims);
    }

    /**
     * Gets claims
     *
     * @return Claim[]
     */
    public function getClaims(): array
    {
        return $this->claims;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'claims' => array_map(fn($item) => $item->toArray(), $this->claims),
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
