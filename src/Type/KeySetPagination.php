<?php
/**
 * KeySetPagination - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * KeySetPagination - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class KeySetPagination implements \JsonSerializable
{
    /**
     * @var string
     */
    private string $dir;

    /**
     * @var int
     */
    private int $lastKey;

    /**
     * @var int
     */
    private int $limit;

    /**
     * Constructor
     */
    public function __construct(
        string $dir,
        int $lastKey,
        int $limit
    ) {
        $this->dir = $dir;
        $this->lastKey = $lastKey;
        $this->limit = $limit;
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
            $data['lastKey'],
            $data['limit']
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
     * Gets lastKey
     *
     * @return int
     */
    public function getLastKey(): int
    {
        return $this->lastKey;
    }

    /**
     * Gets limit
     *
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
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
            'lastKey' => $this->lastKey,
            'limit' => $this->limit,
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
