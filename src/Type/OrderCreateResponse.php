<?php
/**
 * OrderCreateResponse - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

declare(strict_types=1);

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * OrderCreateResponse - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class OrderCreateResponse implements \JsonSerializable
{
    private string $originalOrderId;
    private string $id;
    private IssueOrderCreateResponse $issue;

    /**
     * Constructor
     *
     * @param string $originalOrderId
     * @param string $id
     * @param IssueOrderCreateResponse $issue
     */
    public function __construct(
        string $originalOrderId,
        string $id,
        IssueOrderCreateResponse $issue
    ) {
        $this->originalOrderId = $originalOrderId;
        $this->id = $id;
        $this->issue = $issue;
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
            $data['original_order_id'],
            $data['id'],
            IssueOrderCreateResponse::fromArray($data['issue'])
        );
    }

    /**
     * Gets originalOrderId
     *
     * @return string
     */
    public function getOriginalOrderId(): string
    {
        return $this->originalOrderId;
    }

    /**
     * Gets id
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Gets issue
     *
     * @return IssueOrderCreateResponse
     */
    public function getIssue(): IssueOrderCreateResponse
    {
        return $this->issue;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'original_order_id' => $this->originalOrderId,
            'id' => $this->id,
            'issue' => $this->issue->toArray(),
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
