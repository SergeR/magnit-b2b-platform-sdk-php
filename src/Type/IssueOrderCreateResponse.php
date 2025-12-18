<?php
/**
 * IssueOrderCreateResponse - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * IssueOrderCreateResponse - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class IssueOrderCreateResponse implements \JsonSerializable
{
    /**
     * @var string Стратегия выдачи: 'eac_taker_to_collect'
     */
    private string $strategy;

    /**
     * @var IssueOrderCreateResponsePayload
     */
    private IssueOrderCreateResponsePayload $payload;

    /**
     * Constructor
     */
    public function __construct(
        string $strategy,
        IssueOrderCreateResponsePayload $payload
    ) {
        $this->strategy = $strategy;
        $this->payload = $payload;
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
            $data['strategy'],
            IssueOrderCreateResponsePayload::fromArray($data['payload'])
        );
    }

    /**
     * Gets strategy
     *
     * @return string Стратегия выдачи: 'eac_taker_to_collect'
     */
    public function getStrategy(): string
    {
        return $this->strategy;
    }

    /**
     * Gets payload
     *
     * @return IssueOrderCreateResponsePayload
     */
    public function getPayload(): IssueOrderCreateResponsePayload
    {
        return $this->payload;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'strategy' => $this->strategy,
            'payload' => $this->payload,
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
