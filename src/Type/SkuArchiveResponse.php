<?php
/**
 * SkuArchiveResponse - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * SkuArchiveResponse - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class SkuArchiveResponse implements \JsonSerializable
{
    /**
     * @var string
     */
    private string $errorMsg;

    /**
     * @var string
     */
    private string $sellerSkuId;

    /**
     * @var int
     */
    private int $skuId;

    /**
     * @var bool
     */
    private bool $success;

    /**
     * Constructor
     */
    public function __construct(
        string $errorMsg,
        string $sellerSkuId,
        int $skuId,
        bool $success
    ) {
        $this->errorMsg = $errorMsg;
        $this->sellerSkuId = $sellerSkuId;
        $this->skuId = $skuId;
        $this->success = $success;
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
            $data['errorMsg'],
            $data['sellerSkuId'],
            $data['skuId'],
            $data['success']
        );
    }

    /**
     * Gets errorMsg
     *
     * @return string
     */
    public function getErrorMsg(): string
    {
        return $this->errorMsg;
    }

    /**
     * Gets sellerSkuId
     *
     * @return string
     */
    public function getSellerSkuId(): string
    {
        return $this->sellerSkuId;
    }

    /**
     * Gets skuId
     *
     * @return int
     */
    public function getSkuId(): int
    {
        return $this->skuId;
    }

    /**
     * Gets success
     *
     * @return bool
     */
    public function getSuccess(): bool
    {
        return $this->success;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'errorMsg' => $this->errorMsg,
            'sellerSkuId' => $this->sellerSkuId,
            'skuId' => $this->skuId,
            'success' => $this->success,
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
