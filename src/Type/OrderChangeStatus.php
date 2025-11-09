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
    private $code;

    /**
     * @var string
     */
    private $updatedAt;

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
        if (isset($data['updated_at'])) {
            $this->updatedAt = $data['updated_at'];
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
            OrderStatusEnum::fromArray($data['code']),
            $data['updated_at']
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
     * Gets code
     *
     * @return OrderStatusEnum
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Gets updatedAt
     *
     * @return string
     */
    public function getUpdatedAt()
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
        $data = [];
        
        if (isset($this->code)) {
            $data['code'] = $this->code;
        }
        if (isset($this->updatedAt)) {
            $data['updated_at'] = $this->updatedAt;
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
