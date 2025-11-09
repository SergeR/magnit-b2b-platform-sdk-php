<?php
/**
 * ShortSkuInfoRequest - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * ShortSkuInfoRequest - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class ShortSkuInfoRequest implements \JsonSerializable
{
    /**
     * @var ShortSkuInfoFilter
     */
    private $filters;

    /**
     * @var KeySetPagination
     */
    private $pagination;

            /**
     * Constructor
     */
    public function __construct(
        ShortSkuInfoFilter $filters,
        KeySetPagination $pagination
    ) {
        $this->filters = $filters;
        $this->pagination = $pagination;
    }
        if (isset($data['pagination'])) {
            $this->pagination = $data['pagination'];
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
            ShortSkuInfoFilter::fromArray($data['filters']),
            KeySetPagination::fromArray($data['pagination'])
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
     * Gets filters
     *
     * @return ShortSkuInfoFilter
     */
    public function getFilters()
    {
        return $this->filters;
    }

    /**
     * Gets pagination
     *
     * @return KeySetPagination
     */
    public function getPagination()
    {
        return $this->pagination;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = [];
        
        if (isset($this->filters)) {
            $data['filters'] = $this->filters;
        }
        if (isset($this->pagination)) {
            $data['pagination'] = $this->pagination;
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
