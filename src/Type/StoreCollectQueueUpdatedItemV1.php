<?php
/**
 * StoreCollectQueueUpdatedItemV1 - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * StoreCollectQueueUpdatedItemV1 - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class StoreCollectQueueUpdatedItemV1 implements \JsonSerializable
{
    /**
     * @var string
     */
    private $storeCode;

    /**
     * @var string
     */
    private $completedAt;

    /**
     * @var string
     */
    private $updatedAt;

            /**
     * Constructor
     */
    public function __construct(
        string $storeCode,
        string $completedAt,
        string $updatedAt
    ) {
        $this->storeCode = $storeCode;
        $this->completedAt = $completedAt;
        $this->updatedAt = $updatedAt;
    }
        if (isset($data['completed_at'])) {
            $this->completedAt = $data['completed_at'];
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
            $data['completed_at'],
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
     * Gets completedAt
     *
     * @return string
     */
    public function getCompletedAt()
    {
        return $this->completedAt;
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
        if (isset($this->completedAt)) {
            $data['completed_at'] = $this->completedAt;
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
