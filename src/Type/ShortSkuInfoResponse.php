<?php
/**
 * ShortSkuInfoResponse - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * ShortSkuInfoResponse - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class ShortSkuInfoResponse implements \JsonSerializable
{
    /**
     * @var ShortSkuInfo[]
     */
    private array $result;

    /**
     * @var int
     */
    private int $resultCount;

    /**
     * @var int
     */
    private int $shopId;

    /**
     * Constructor
     */
    public function __construct(
        array $result,
        int $resultCount,
        int $shopId
    ) {
        $this->result = $result;
        $this->resultCount = $resultCount;
        $this->shopId = $shopId;
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
            isset($data['result']) ? array_map(fn($item) => ShortSkuInfo::fromArray($item), $data['result']) : [],
            $data['resultCount'],
            $data['shopId']
        );
    }

    /**
     * Gets result
     *
     * @return ShortSkuInfo[]
     */
    public function getResult(): array
    {
        return $this->result;
    }

    /**
     * Gets resultCount
     *
     * @return int
     */
    public function getResultCount(): int
    {
        return $this->resultCount;
    }

    /**
     * Gets shopId
     *
     * @return int
     */
    public function getShopId(): int
    {
        return $this->shopId;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'result' => array_map(fn($item) => $item->jsonSerialize(), $this->result),
            'resultCount' => $this->resultCount,
            'shopId' => $this->shopId,
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
