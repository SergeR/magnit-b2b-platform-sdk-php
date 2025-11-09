<?php
/**
 * ClaimsEvent - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * ClaimsEvent - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class ClaimsEvent implements \JsonSerializable
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $claimId;

    /**
     * @var \DateTime
     */
    private $eventTime;

    /**
     * @var ClaimsEventEvent
     */
    private $event;

            /**
     * Constructor
     */
    public function __construct(
        string $id,
        string $claimId,
        \DateTime $eventTime,
        ClaimsEventEvent $event
    ) {
        $this->id = $id;
        $this->claimId = $claimId;
        $this->eventTime = $eventTime;
        $this->event = $event;
    }
        if (isset($data['claim_id'])) {
            $this->claimId = $data['claim_id'];
        }
        if (isset($data['event_time'])) {
            $this->eventTime = $data['event_time'];
        }
        if (isset($data['event'])) {
            $this->event = $data['event'];
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
            $data['id'],
            $data['claim_id'],
            \DateTime::fromArray($data['event_time']),
            ClaimsEventEvent::fromArray($data['event'])
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
     * Gets id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Gets claimId
     *
     * @return string
     */
    public function getClaimId()
    {
        return $this->claimId;
    }

    /**
     * Gets eventTime
     *
     * @return \DateTime
     */
    public function getEventTime()
    {
        return $this->eventTime;
    }

    /**
     * Gets event
     *
     * @return ClaimsEventEvent
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = [];
        
        if (isset($this->id)) {
            $data['id'] = $this->id;
        }
        if (isset($this->claimId)) {
            $data['claim_id'] = $this->claimId;
        }
        if (isset($this->eventTime)) {
            $data['event_time'] = $this->eventTime instanceof \JsonSerializable ? $this->eventTime->jsonSerialize() : $this->eventTime;
        }
        if (isset($this->event)) {
            $data['event'] = $this->event;
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
