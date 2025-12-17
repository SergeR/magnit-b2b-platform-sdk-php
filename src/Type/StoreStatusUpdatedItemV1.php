<?php
/**
 * StoreStatusUpdatedItemV1 - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * StoreStatusUpdatedItemV1 - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class StoreStatusUpdatedItemV1 implements \JsonSerializable
{
    /**
     * @var string
     */
    private string $storeCode;

    /**
     * @var StoreStatusEnum
     */
    private StoreStatusEnum $status;

    /**
     * @var string
     */
    private string $updatedAt;

    /**
     * Constructor
     */
    public function __construct(
        string $storeCode,
        StoreStatusEnum $status,
        string $updatedAt
    ) {
        $this->storeCode = $storeCode;
        $this->status = $status;
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
            $data['storeCode'],
            StoreStatusEnum::fromArray($data['status']),
            $data['updatedAt']
        );
    }

    /**
     * Gets storeCode
     *
     * @return string
     */
    public function getStoreCode(): string
    {
        return $this->storeCode;
    }

    /**
     * Gets status
     *
     * @return StoreStatusEnum
     */
    public function getStatus(): StoreStatusEnum
    {
        return $this->status;
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
            'storeCode' => $this->storeCode,
            'status' => $this->status,
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
