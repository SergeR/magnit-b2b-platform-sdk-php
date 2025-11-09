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
    private $errorMsg;

    /**
     * @var int
     */
    private $productId;

    /**
     * @var bool
     */
    private $success;

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
        if (isset($data['product_id'])) {
            $this->productId = $data['product_id'];
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
            $data['product_id'],
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
     * Gets productId
     *
     * @return int
     */
    public function getProductId()
    {
        return $this->productId;
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
        if (isset($this->productId)) {
            $data['product_id'] = $this->productId;
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
