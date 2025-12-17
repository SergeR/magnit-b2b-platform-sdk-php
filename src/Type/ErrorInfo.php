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
    private string $attributeError;

    /**
     * @var string
     */
    private string $message;

    /**
     * @var string
     */
    private string $sellerSkuId;

    /**
     * @var string
     */
    private string $status;

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

    /**
     * Создать из массива
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['attributeError'],
            $data['message'],
            $data['sellerSkuId'],
            $data['status']
        );
    }

    /**
     * Gets attributeError
     *
     * @return string
     */
    public function getAttributeError(): string
    {
        return $this->attributeError;
    }

    /**
     * Gets message
     *
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
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
     * Gets status
     *
     * @return string
     */
    public function getStatus(): string
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
        return [
            'attributeError' => $this->attributeError,
            'message' => $this->message,
            'sellerSkuId' => $this->sellerSkuId,
            'status' => $this->status,
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
