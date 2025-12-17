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
     * @var IssueStrategyEnum
     */
    private IssueStrategyEnum $strategy;

    /**
     * @var IssueOrderCreateResponsePayload
     */
    private IssueOrderCreateResponsePayload $payload;

    /**
     * Constructor
     */
    public function __construct(
        IssueStrategyEnum $strategy,
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
            IssueStrategyEnum::fromArray($data['strategy']),
            IssueOrderCreateResponsePayload::fromArray($data['payload'])
        );
    }

    /**
     * Gets strategy
     *
     * @return IssueStrategyEnum
     */
    public function getStrategy(): IssueStrategyEnum
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
