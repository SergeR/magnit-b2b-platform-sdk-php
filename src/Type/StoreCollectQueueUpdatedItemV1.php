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
    private string $storeCode;

    /**
     * @var string
     */
    private string $completedAt;

    /**
     * @var string
     */
    private string $updatedAt;

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
            $data['completedAt'],
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
     * Gets completedAt
     *
     * @return string
     */
    public function getCompletedAt(): string
    {
        return $this->completedAt;
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
            'completedAt' => $this->completedAt,
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
