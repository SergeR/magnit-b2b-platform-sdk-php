<?php
/**
 * V1OrdersOrderIdCancelPostRequest - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * V1OrdersOrderIdCancelPostRequest - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class V1OrdersOrderIdCancelPostRequest implements \JsonSerializable
{
    /**
     * @var OrderCancellationReasonEnum
     */
    private $reason;

    /**
     * @var string
     */
    private $cancelledAt;

            /**
     * Constructor
     */
    public function __construct(
        OrderCancellationReasonEnum $reason,
        string $cancelledAt
    ) {
        $this->reason = $reason;
        $this->cancelledAt = $cancelledAt;
    }
        if (isset($data['cancelled_at'])) {
            $this->cancelledAt = $data['cancelled_at'];
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
            OrderCancellationReasonEnum::fromArray($data['reason']),
            $data['cancelled_at']
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
     * Gets reason
     *
     * @return OrderCancellationReasonEnum
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * Gets cancelledAt
     *
     * @return string
     */
    public function getCancelledAt()
    {
        return $this->cancelledAt;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = [];
        
        if (isset($this->reason)) {
            $data['reason'] = $this->reason;
        }
        if (isset($this->cancelledAt)) {
            $data['cancelled_at'] = $this->cancelledAt;
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
