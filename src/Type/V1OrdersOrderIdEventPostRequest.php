<?php
/**
 * V1OrdersOrderIdEventPostRequest - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * V1OrdersOrderIdEventPostRequest - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class V1OrdersOrderIdEventPostRequest implements \JsonSerializable
{
    /**
     * @var OrderNotificationTypeEnum
     */
    private OrderNotificationTypeEnum $type;

    /**
     * Constructor
     */
    public function __construct(
        OrderNotificationTypeEnum $type
    ) {
        $this->type = $type;
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
            OrderNotificationTypeEnum::fromArray($data['type'])
        );
    }

    /**
     * Gets type
     *
     * @return OrderNotificationTypeEnum
     */
    public function getType(): OrderNotificationTypeEnum
    {
        return $this->type;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'type' => $this->type,
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
