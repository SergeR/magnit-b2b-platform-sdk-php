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
    private $errorMsg;

    /**
     * @var string
     */
    private $sellerSkuId;

    /**
     * @var int
     */
    private $skuId;

    /**
     * @var bool
     */
    private $success;

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
        if (isset($data['seller_sku_id'])) {
            $this->sellerSkuId = $data['seller_sku_id'];
        }
        if (isset($data['sku_id'])) {
            $this->skuId = $data['sku_id'];
        }
        if (isset($data['success'])) {
            $this->success = $data['success'];
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
            $data['error_msg'],
            $data['seller_sku_id'],
            $data['sku_id'],
            $data['success']
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
     * Gets errorMsg
     *
     * @return string
     */
    public function getErrorMsg()
    {
        return $this->errorMsg;
    }

    /**
     * Gets sellerSkuId
     *
     * @return string
     */
    public function getSellerSkuId()
    {
        return $this->sellerSkuId;
    }

    /**
     * Gets skuId
     *
     * @return int
     */
    public function getSkuId()
    {
        return $this->skuId;
    }

    /**
     * Gets success
     *
     * @return bool
     */
    public function getSuccess()
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
        $data = [];
        
        if (isset($this->errorMsg)) {
            $data['error_msg'] = $this->errorMsg;
        }
        if (isset($this->sellerSkuId)) {
            $data['seller_sku_id'] = $this->sellerSkuId;
        }
        if (isset($this->skuId)) {
            $data['sku_id'] = $this->skuId;
        }
        if (isset($this->success)) {
            $data['success'] = $this->success;
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
