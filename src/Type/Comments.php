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
    private string $customerComment;

    /**
     * @var string
     */
    private string $vendorComment;

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
     * Gets customerComment
     *
     * @return string
     */
    public function getCustomerComment(): string
    {
        return $this->customerComment;
    }

    /**
     * Gets vendorComment
     *
     * @return string
     */
    public function getVendorComment(): string
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
        return [
            'customerComment' => $this->customerComment,
            'vendorComment' => $this->vendorComment,
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
