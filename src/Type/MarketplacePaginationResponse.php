<?php
/**
 * MarketplacePaginationResponse - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * MarketplacePaginationResponse - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class MarketplacePaginationResponse implements \JsonSerializable
{
    /**
     * @var string
     */
    private string $nextPageToken;

    /**
     * Constructor
     */
    public function __construct(
        string $nextPageToken
    ) {
        $this->nextPageToken = $nextPageToken;
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
            $data['nextPageToken']
        );
    }

    /**
     * Gets nextPageToken
     *
     * @return string
     */
    public function getNextPageToken(): string
    {
        return $this->nextPageToken;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'nextPageToken' => $this->nextPageToken,
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
