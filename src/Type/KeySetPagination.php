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
    private $dir;

    /**
     * @var int
     */
    private $lastKey;

    /**
     * @var int
     */
    private $limit;

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
        if (isset($data['last_key'])) {
            $this->lastKey = $data['last_key'];
        }
        if (isset($data['limit'])) {
            $this->limit = $data['limit'];
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
            $data['last_key'],
            $data['limit']
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
     * Gets lastKey
     *
     * @return int
     */
    public function getLastKey()
    {
        return $this->lastKey;
    }

    /**
     * Gets limit
     *
     * @return int
     */
    public function getLimit()
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
        $data = [];
        
        if (isset($this->dir)) {
            $data['dir'] = $this->dir;
        }
        if (isset($this->lastKey)) {
            $data['last_key'] = $this->lastKey;
        }
        if (isset($this->limit)) {
            $data['limit'] = $this->limit;
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
