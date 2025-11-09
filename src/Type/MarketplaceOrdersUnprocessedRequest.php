<?php
/**
 * MarketplaceOrdersUnprocessedRequest - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * MarketplaceOrdersUnprocessedRequest - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class MarketplaceOrdersUnprocessedRequest implements \JsonSerializable
{
    /**
     * @var int
     */
    private $pageSize;

    /**
     * @var string
     */
    private $pageToken;

    /**
     * @var MarketplaceSortDirection
     */
    private $dir;

    /**
     * @var MarketplaceFilterDateTime
     */
    private $cutoffTime;

            /**
     * Constructor
     */
    public function __construct(
        int $pageSize,
        string $pageToken,
        MarketplaceSortDirection $dir,
        MarketplaceFilterDateTime $cutoffTime
    ) {
        $this->pageSize = $pageSize;
        $this->pageToken = $pageToken;
        $this->dir = $dir;
        $this->cutoffTime = $cutoffTime;
    }
        if (isset($data['page_token'])) {
            $this->pageToken = $data['page_token'];
        }
        if (isset($data['dir'])) {
            $this->dir = $data['dir'];
        }
        if (isset($data['cutoff_time'])) {
            $this->cutoffTime = $data['cutoff_time'];
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
            $data['page_size'],
            $data['page_token'],
            MarketplaceSortDirection::fromArray($data['dir']),
            MarketplaceFilterDateTime::fromArray($data['cutoff_time'])
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
     * Gets pageSize
     *
     * @return int
     */
    public function getPageSize()
    {
        return $this->pageSize;
    }

    /**
     * Gets pageToken
     *
     * @return string
     */
    public function getPageToken()
    {
        return $this->pageToken;
    }

    /**
     * Gets dir
     *
     * @return MarketplaceSortDirection
     */
    public function getDir()
    {
        return $this->dir;
    }

    /**
     * Gets cutoffTime
     *
     * @return MarketplaceFilterDateTime
     */
    public function getCutoffTime()
    {
        return $this->cutoffTime;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = [];
        
        if (isset($this->pageSize)) {
            $data['page_size'] = $this->pageSize;
        }
        if (isset($this->pageToken)) {
            $data['page_token'] = $this->pageToken;
        }
        if (isset($this->dir)) {
            $data['dir'] = $this->dir;
        }
        if (isset($this->cutoffTime)) {
            $data['cutoff_time'] = $this->cutoffTime;
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
