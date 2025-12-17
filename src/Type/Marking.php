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
    private int $qnty;

    /**
     * @var string
     */
    private string $cis;

    /**
     * @var MarkingRequest
     */
    private MarkingRequest $request;

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
     * Gets qnty
     *
     * @return int
     */
    public function getQnty(): int
    {
        return $this->qnty;
    }

    /**
     * Gets cis
     *
     * @return string
     */
    public function getCis(): string
    {
        return $this->cis;
    }

    /**
     * Gets request
     *
     * @return MarkingRequest
     */
    public function getRequest(): MarkingRequest
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
        return [
            'qnty' => $this->qnty,
            'cis' => $this->cis,
            'request' => $this->request,
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
