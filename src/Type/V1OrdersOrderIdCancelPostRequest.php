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
    private OrderCancellationReasonEnum $reason;

    /**
     * @var string
     */
    private string $cancelledAt;

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
            $data['cancelledAt']
        );
    }

    /**
     * Gets reason
     *
     * @return OrderCancellationReasonEnum
     */
    public function getReason(): OrderCancellationReasonEnum
    {
        return $this->reason;
    }

    /**
     * Gets cancelledAt
     *
     * @return string
     */
    public function getCancelledAt(): string
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
        return [
            'reason' => $this->reason,
            'cancelledAt' => $this->cancelledAt,
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
