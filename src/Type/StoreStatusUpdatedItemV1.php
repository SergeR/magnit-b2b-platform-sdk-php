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
    private $storeCode;

    /**
     * @var StoreStatusEnum
     */
    private $status;

    /**
     * @var string
     */
    private $updatedAt;

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
        if (isset($data['status'])) {
            $this->status = $data['status'];
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
            $data['store_code'],
            StoreStatusEnum::fromArray($data['status']),
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
     * Gets storeCode
     *
     * @return string
     */
    public function getStoreCode()
    {
        return $this->storeCode;
    }

    /**
     * Gets status
     *
     * @return StoreStatusEnum
     */
    public function getStatus()
    {
        return $this->status;
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
        
        if (isset($this->storeCode)) {
            $data['store_code'] = $this->storeCode;
        }
        if (isset($this->status)) {
            $data['status'] = $this->status;
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
