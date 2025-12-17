<?php
/**
 * OrderChangeRequestStatus - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * OrderChangeRequestStatus - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class OrderChangeRequestStatus implements \JsonSerializable
{
    /**
     * @var OrderChangeStatusRequestEnum
     */
    private OrderChangeStatusRequestEnum $code;

    /**
     * @var string
     */
    private string $updatedAt;

    /**
     * Constructor
     */
    public function __construct(
        OrderChangeStatusRequestEnum $code,
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
            OrderChangeStatusRequestEnum::fromArray($data['code']),
            $data['updatedAt']
        );
    }

    /**
     * Gets code
     *
     * @return OrderChangeStatusRequestEnum
     */
    public function getCode(): OrderChangeStatusRequestEnum
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
