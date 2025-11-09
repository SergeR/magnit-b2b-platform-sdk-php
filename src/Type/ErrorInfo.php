<?php
/**
 * ErrorInfo - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * ErrorInfo - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class ErrorInfo implements \JsonSerializable
{
    /**
     * @var string
     */
    private $attributeError;

    /**
     * @var string
     */
    private $message;

    /**
     * @var string
     */
    private $sellerSkuId;

    /**
     * @var string
     */
    private $status;

            /**
     * Constructor
     */
    public function __construct(
        string $attributeError,
        string $message,
        string $sellerSkuId,
        string $status
    ) {
        $this->attributeError = $attributeError;
        $this->message = $message;
        $this->sellerSkuId = $sellerSkuId;
        $this->status = $status;
    }
        if (isset($data['message'])) {
            $this->message = $data['message'];
        }
        if (isset($data['seller_sku_id'])) {
            $this->sellerSkuId = $data['seller_sku_id'];
        }
        if (isset($data['status'])) {
            $this->status = $data['status'];
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
            $data['attribute_error'],
            $data['message'],
            $data['seller_sku_id'],
            $data['status']
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
     * Gets attributeError
     *
     * @return string
     */
    public function getAttributeError()
    {
        return $this->attributeError;
    }

    /**
     * Gets message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
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
     * Gets status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = [];
        
        if (isset($this->attributeError)) {
            $data['attribute_error'] = $this->attributeError;
        }
        if (isset($this->message)) {
            $data['message'] = $this->message;
        }
        if (isset($this->sellerSkuId)) {
            $data['seller_sku_id'] = $this->sellerSkuId;
        }
        if (isset($this->status)) {
            $data['status'] = $this->status;
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
