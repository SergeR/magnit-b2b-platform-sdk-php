<?php
/**
 * Marking - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * Marking - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class Marking implements \JsonSerializable
{
    /**
     * @var int
     */
    private $qnty;

    /**
     * @var string
     */
    private $cis;

    /**
     * @var MarkingRequest
     */
    private $request;

            /**
     * Constructor
     */
    public function __construct(
        int $qnty,
        string $cis,
        MarkingRequest $request
    ) {
        $this->qnty = $qnty;
        $this->cis = $cis;
        $this->request = $request;
    }
        if (isset($data['cis'])) {
            $this->cis = $data['cis'];
        }
        if (isset($data['request'])) {
            $this->request = $data['request'];
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
            $data['qnty'],
            $data['cis'],
            MarkingRequest::fromArray($data['request'])
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
     * Gets qnty
     *
     * @return int
     */
    public function getQnty()
    {
        return $this->qnty;
    }

    /**
     * Gets cis
     *
     * @return string
     */
    public function getCis()
    {
        return $this->cis;
    }

    /**
     * Gets request
     *
     * @return MarkingRequest
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = [];
        
        if (isset($this->qnty)) {
            $data['qnty'] = $this->qnty;
        }
        if (isset($this->cis)) {
            $data['cis'] = $this->cis;
        }
        if (isset($this->request)) {
            $data['request'] = $this->request;
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
