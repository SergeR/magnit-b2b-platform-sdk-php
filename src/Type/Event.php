<?php
/**
 * Event - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * Event - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class Event implements \JsonSerializable
{
    /**
     * @var EventEnum
     */
    private EventEnum $type;

    /**
     * @var EventPayload
     */
    private EventPayload $payload;

    /**
     * @var string
     */
    private string $createdAt;

    /**
     * Constructor
     */
    public function __construct(
        EventEnum $type,
        EventPayload $payload,
        string $createdAt
    ) {
        $this->type = $type;
        $this->payload = $payload;
        $this->createdAt = $createdAt;
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
            EventEnum::fromArray($data['type']),
            EventPayload::fromArray($data['payload']),
            $data['createdAt']
        );
    }

    /**
     * Gets type
     *
     * @return EventEnum
     */
    public function getType(): EventEnum
    {
        return $this->type;
    }

    /**
     * Gets payload
     *
     * @return EventPayload
     */
    public function getPayload(): EventPayload
    {
        return $this->payload;
    }

    /**
     * Gets createdAt
     *
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'type' => $this->type,
            'payload' => $this->payload,
            'createdAt' => $this->createdAt,
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
