<?php
/**
 * OrderStatus - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * OrderStatus - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class OrderStatus implements \JsonSerializable
{
    private string $code;
    private ?string $reason;
    private string $updatedAt;

    /**
     * Constructor
     *
     * @param string $code Код статуса
     * @param string|null $reason Причина отмены (опционально)
     * @param string $updatedAt Дата обновления
     */
    public function __construct(
        string $code,
        ?string $reason,
        string $updatedAt
    ) {
        $this->code = $code;
        $this->reason = $reason;
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
            $data['code'],
            $data['reason'] ?? null,
            $data['updated_at']
        );
    }

    /**
     * Gets code
     *
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * Gets reason
     *
     * @return string|null
     */
    public function getReason(): ?string
    {
        return $this->reason;
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
        $data = [
            'code' => $this->code,
            'updated_at' => $this->updatedAt,
        ];
        
        if ($this->reason !== null) {
            $data['reason'] = $this->reason;
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
}
