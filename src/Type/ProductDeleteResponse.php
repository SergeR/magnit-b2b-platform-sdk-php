<?php
/**
 * ProductDeleteResponse - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * ProductDeleteResponse - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class ProductDeleteResponse implements \JsonSerializable
{
    /**
     * @var string
     */
    private string $errorMsg;

    /**
     * @var int
     */
    private int $productId;

    /**
     * @var bool
     */
    private bool $success;

    /**
     * Constructor
     */
    public function __construct(
        string $errorMsg,
        int $productId,
        bool $success
    ) {
        $this->errorMsg = $errorMsg;
        $this->productId = $productId;
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
            $data['productId'],
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
     * Gets productId
     *
     * @return int
     */
    public function getProductId(): int
    {
        return $this->productId;
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
            'productId' => $this->productId,
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
