<?php
/**
 * Pager - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

declare(strict_types=1);

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * Pager - Информация о пагинации
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class Pager implements \JsonSerializable
{
    private int $totalItems;
    private int $totalPages;
    private int $currentPage;
    private int $pageSize;

    /**
     * Constructor
     *
     * @param int $totalItems Всего элементов
     * @param int $totalPages Всего страниц
     * @param int $currentPage Текущая страница
     * @param int $pageSize Размер страницы
     */
    public function __construct(
        int $totalItems,
        int $totalPages,
        int $currentPage,
        int $pageSize
    ) {
        $this->totalItems = $totalItems;
        $this->totalPages = $totalPages;
        $this->currentPage = $currentPage;
        $this->pageSize = $pageSize;
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
            $data['totalItems'],
            $data['totalPages'],
            $data['currentPage'],
            $data['pageSize']
        );
    }

    /**
     * Gets totalItems
     *
     * @return int
     */
    public function getTotalItems(): int
    {
        return $this->totalItems;
    }

    /**
     * Gets totalPages
     *
     * @return int
     */
    public function getTotalPages(): int
    {
        return $this->totalPages;
    }

    /**
     * Gets currentPage
     *
     * @return int
     */
    public function getCurrentPage(): int
    {
        return $this->currentPage;
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
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'total_items' => $this->totalItems,
            'total_pages' => $this->totalPages,
            'current_page' => $this->currentPage,
            'page_size' => $this->pageSize,
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
