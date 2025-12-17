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
    private ShortSkuInfoFilter $filters;

    /**
     * @var KeySetPagination
     */
    private KeySetPagination $pagination;

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
     * Gets filters
     *
     * @return ShortSkuInfoFilter
     */
    public function getFilters(): ShortSkuInfoFilter
    {
        return $this->filters;
    }

    /**
     * Gets pagination
     *
     * @return KeySetPagination
     */
    public function getPagination(): KeySetPagination
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
        return [
            'filters' => $this->filters,
            'pagination' => $this->pagination,
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
