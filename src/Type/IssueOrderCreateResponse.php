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
    private $strategy;

    /**
     * @var IssueOrderCreateResponsePayload
     */
    private $payload;

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
        if (isset($data['payload'])) {
            $this->payload = $data['payload'];
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
            IssueStrategyEnum::fromArray($data['strategy']),
            IssueOrderCreateResponsePayload::fromArray($data['payload'])
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
     * @return IssueStrategyEnum
     */
    public function getStrategy()
    {
        return $this->strategy;
    }

    /**
     * Gets payload
     *
     * @return IssueOrderCreateResponsePayload
     */
    public function getPayload()
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
        $data = [];
        
        if (isset($this->strategy)) {
            $data['strategy'] = $this->strategy;
        }
        if (isset($this->payload)) {
            $data['payload'] = $this->payload;
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
