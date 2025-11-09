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
    private $dir;

    /**
     * @var int
     */
    private $page;

    /**
     * @var int
     */
    private $pageSize;

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
        if (isset($data['page'])) {
            $this->page = $data['page'];
        }
        if (isset($data['page_size'])) {
            $this->pageSize = $data['page_size'];
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
            $data['dir'],
            $data['page'],
            $data['page_size']
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
     * Gets dir
     *
     * @return string
     */
    public function getDir()
    {
        return $this->dir;
    }

    /**
     * Gets page
     *
     * @return int
     */
    public function getPage()
    {
        return $this->page;
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
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = [];
        
        if (isset($this->dir)) {
            $data['dir'] = $this->dir;
        }
        if (isset($this->page)) {
            $data['page'] = $this->page;
        }
        if (isset($this->pageSize)) {
            $data['page_size'] = $this->pageSize;
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
