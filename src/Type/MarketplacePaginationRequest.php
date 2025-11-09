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
    private $pageSize;

    /**
     * @var string
     */
    private $pageToken;

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
        if (isset($data['page_token'])) {
            $this->pageToken = $data['page_token'];
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
            $data['page_token']
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
