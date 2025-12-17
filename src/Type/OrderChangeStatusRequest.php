<?php
/**
 * OrderChangeStatusRequest - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * OrderChangeStatusRequest - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class OrderChangeStatusRequest implements \JsonSerializable
{
    /**
     * @var OrderChangeRequestStatus
     */
    private OrderChangeRequestStatus $status;

    /**
     * Constructor
     */
    public function __construct(
        OrderChangeRequestStatus $status
    ) {
        $this->status = $status;
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
            OrderChangeRequestStatus::fromArray($data['status'])
        );
    }

    /**
     * Gets status
     *
     * @return OrderChangeRequestStatus
     */
    public function getStatus(): OrderChangeRequestStatus
    {
        return $this->status;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'status' => $this->status,
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
