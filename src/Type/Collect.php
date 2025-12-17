<?php
/**
 * Collect - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * Collect - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class Collect implements \JsonSerializable
{
    /**
     * @var CollectReplacementStrategyEnum
     */
    private CollectReplacementStrategyEnum $strategy;

    /**
     * @var string
     */
    private string $desiredAt;

    /**
     * Constructor
     */
    public function __construct(
        CollectReplacementStrategyEnum $strategy,
        string $desiredAt
    ) {
        $this->strategy = $strategy;
        $this->desiredAt = $desiredAt;
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
            CollectReplacementStrategyEnum::fromArray($data['strategy']),
            $data['desiredAt']
        );
    }

    /**
     * Gets strategy
     *
     * @return CollectReplacementStrategyEnum
     */
    public function getStrategy(): CollectReplacementStrategyEnum
    {
        return $this->strategy;
    }

    /**
     * Gets desiredAt
     *
     * @return string
     */
    public function getDesiredAt(): string
    {
        return $this->desiredAt;
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
            'desiredAt' => $this->desiredAt,
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
