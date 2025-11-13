<?php
/**
 * Comments - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * Comments - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class Comments implements \JsonSerializable
{
    /**
     * @var string
     */
    private $customerComment;

    /**
     * @var string
     */
    private $vendorComment;

            /**
     * Constructor
     */
    public function __construct(
        string $customerComment,
        string $vendorComment
    ) {
        $this->customerComment = $customerComment;
        $this->vendorComment = $vendorComment;
    }
        if (isset($data['vendorComment'])) {
            $this->vendorComment = $data['vendorComment'];
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
            $data['customerComment'] ?? '',
            $data['vendorComment'] ?? ''
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
     * Gets customerComment
     *
     * @return string
     */
    public function getCustomerComment()
    {
        return $this->customerComment;
    }

    /**
     * Gets vendorComment
     *
     * @return string
     */
    public function getVendorComment()
    {
        return $this->vendorComment;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = [];
        
        if (isset($this->customerComment)) {
            $data['customerComment'] = $this->customerComment;
        }
        if (isset($this->vendorComment)) {
            $data['vendorComment'] = $this->vendorComment;
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
