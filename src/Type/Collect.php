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
    private $strategy;

    /**
     * @var string
     */
    private $desiredAt;

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
        if (isset($data['desired_at'])) {
            $this->desiredAt = $data['desired_at'];
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
            CollectReplacementStrategyEnum::fromArray($data['strategy']),
            $data['desired_at']
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
     * Gets strategy
     *
     * @return CollectReplacementStrategyEnum
     */
    public function getStrategy()
    {
        return $this->strategy;
    }

    /**
     * Gets desiredAt
     *
     * @return string
     */
    public function getDesiredAt()
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
        $data = [];
        
        if (isset($this->strategy)) {
            $data['strategy'] = $this->strategy;
        }
        if (isset($this->desiredAt)) {
            $data['desired_at'] = $this->desiredAt;
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
