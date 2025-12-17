<?php
/**
 * Pagination - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * Pagination - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class Pagination implements \JsonSerializable
{
    /**
     * @var string
     */
    private string $dir;

    /**
     * @var int
     */
    private int $page;

    /**
     * @var int
     */
    private int $pageSize;

    /**
     * Constructor
     */
    public function __construct(
        string $dir,
        int $page,
        int $pageSize
    ) {
        $this->dir = $dir;
        $this->page = $page;
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
            $data['dir'],
            $data['page'],
            $data['pageSize']
        );
    }

    /**
     * Gets dir
     *
     * @return string
     */
    public function getDir(): string
    {
        return $this->dir;
    }

    /**
     * Gets page
     *
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;
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
            'dir' => $this->dir,
            'page' => $this->page,
            'pageSize' => $this->pageSize,
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
