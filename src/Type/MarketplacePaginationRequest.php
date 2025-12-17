<?php
/**
 * MarketplacePaginationRequest - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * MarketplacePaginationRequest - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class MarketplacePaginationRequest implements \JsonSerializable
{
    /**
     * @var int
     */
    private int $pageSize;

    /**
     * @var string
     */
    private string $pageToken;

    /**
     * Constructor
     */
    public function __construct(
        int $pageSize,
        string $pageToken
    ) {
        $this->pageSize = $pageSize;
        $this->pageToken = $pageToken;
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
            $data['pageSize'],
            $data['pageToken']
        );
    }

    /**
     * Gets pageSize
     *
     * @return int
     */
    public function getPageSize(): int
    {
        return $this->pageSize;
    }

    /**
     * Gets pageToken
     *
     * @return string
     */
    public function getPageToken(): string
    {
        return $this->pageToken;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'pageSize' => $this->pageSize,
            'pageToken' => $this->pageToken,
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
