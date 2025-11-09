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
    private $type;

    /**
     * @var EventPayload
     */
    private $payload;

    /**
     * @var string
     */
    private $createdAt;

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
        if (isset($data['payload'])) {
            $this->payload = $data['payload'];
        }
        if (isset($data['created_at'])) {
            $this->createdAt = $data['created_at'];
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
            EventEnum::fromArray($data['type']),
            EventPayload::fromArray($data['payload']),
            $data['created_at']
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
     * Gets type
     *
     * @return EventEnum
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Gets payload
     *
     * @return EventPayload
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * Gets createdAt
     *
     * @return string
     */
    public function getCreatedAt()
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
        $data = [];
        
        if (isset($this->type)) {
            $data['type'] = $this->type;
        }
        if (isset($this->payload)) {
            $data['payload'] = $this->payload;
        }
        if (isset($this->createdAt)) {
            $data['created_at'] = $this->createdAt;
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
