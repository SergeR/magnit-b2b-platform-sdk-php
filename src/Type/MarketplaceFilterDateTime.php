<?php
/**
 * MarketplaceFilterDateTime - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * MarketplaceFilterDateTime - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class MarketplaceFilterDateTime implements \JsonSerializable
{
    /**
     * @var \DateTime
     */
    private \DateTime $from;

    /**
     * @var \DateTime
     */
    private \DateTime $to;

    /**
     * Constructor
     */
    public function __construct(
        \DateTime $from,
        \DateTime $to
    ) {
        $this->from = $from;
        $this->to = $to;
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
            \DateTime::createFromFormat('Y-m-d\TH:i:s', $data['from']) ?: new \DateTime($data['from']),
            \DateTime::createFromFormat('Y-m-d\TH:i:s', $data['to']) ?: new \DateTime($data['to'])
        );
    }

    /**
     * Gets from
     *
     * @return \DateTime
     */
    public function getFrom(): \DateTime
    {
        return $this->from;
    }

    /**
     * Gets to
     *
     * @return \DateTime
     */
    public function getTo(): \DateTime
    {
        return $this->to;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'from' => $this->from instanceof \JsonSerializable ? $this->from->jsonSerialize() : $this->from,
            'to' => $this->to instanceof \JsonSerializable ? $this->to->jsonSerialize() : $this->to,
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
