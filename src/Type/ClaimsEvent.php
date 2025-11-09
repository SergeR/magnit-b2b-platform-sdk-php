<?php
/**
 * ClaimsEvent - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

declare(strict_types=1);

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * ClaimsEvent - Событие заявки
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class ClaimsEvent implements \JsonSerializable
{
    private string $id;
    private string $claimId;
    private \DateTime $eventTime;
    private ClaimsEventEvent $event;

    /**
     * Constructor
     *
     * @param string $id ID события
     * @param string $claimId ID заявки
     * @param \DateTime $eventTime Время события
     * @param ClaimsEventEvent $event Данные события
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

    /**
     * Создать из массива
     *
     * @param array $data
     * @return self
     * @throws \Exception
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'] ?? '',
            $data['claim_id'] ?? '',
            new \DateTime($data['event_time'] ?? 'now'),
            ClaimsEventEvent::fromArray($data['event'] ?? [])
        );
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
     * Gets claimId
     *
     * @return string
     */
    public function getClaimId(): string
    {
        return $this->claimId;
    }

    /**
     * Gets eventTime
     *
     * @return \DateTime
     */
    public function getEventTime(): \DateTime
    {
        return $this->eventTime;
    }

    /**
     * Gets event
     *
     * @return ClaimsEventEvent
     */
    public function getEvent(): ClaimsEventEvent
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
        return [
            'id' => $this->id,
            'claim_id' => $this->claimId,
            'event_time' => $this->eventTime->format(\DateTimeInterface::ATOM),
            'event' => $this->event->toArray(),
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
