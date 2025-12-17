<?php
/**
 * SkuListRequest - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * SkuListRequest - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class SkuListRequest implements \JsonSerializable
{
    /**
     * @var SkuRequestFilter
     */
    private SkuRequestFilter $filter;

    /**
     * @var Pagination
     */
    private Pagination $pagination;

    /**
     * Constructor
     */
    public function __construct(
        SkuRequestFilter $filter,
        Pagination $pagination
    ) {
        $this->filter = $filter;
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
            SkuRequestFilter::fromArray($data['filter']),
            Pagination::fromArray($data['pagination'])
        );
    }

    /**
     * Gets filter
     *
     * @return SkuRequestFilter
     */
    public function getFilter(): SkuRequestFilter
    {
        return $this->filter;
    }

    /**
     * Gets pagination
     *
     * @return Pagination
     */
    public function getPagination(): Pagination
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
            'filter' => $this->filter,
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
