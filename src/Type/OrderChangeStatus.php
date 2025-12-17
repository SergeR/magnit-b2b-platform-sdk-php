<?php
/**
 * OrderChangeStatus - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * OrderChangeStatus - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class OrderChangeStatus implements \JsonSerializable
{
    /**
     * @var OrderStatusEnum
     */
    private OrderStatusEnum $code;

    /**
     * @var string
     */
    private string $updatedAt;

    /**
     * Constructor
     */
    public function __construct(
        OrderStatusEnum $code,
        string $updatedAt
    ) {
        $this->code = $code;
        $this->updatedAt = $updatedAt;
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
            OrderStatusEnum::fromArray($data['code']),
            $data['updatedAt']
        );
    }

    /**
     * Gets code
     *
     * @return OrderStatusEnum
     */
    public function getCode(): OrderStatusEnum
    {
        return $this->code;
    }

    /**
     * Gets updatedAt
     *
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'code' => $this->code,
            'updatedAt' => $this->updatedAt,
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
