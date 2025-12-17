<?php
/**
 * MarketplaceApiErrorResponseAllOf - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * MarketplaceApiErrorResponseAllOf - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class MarketplaceApiErrorResponseAllOf implements \JsonSerializable
{
    /**
     * @var MarketplaceApiError[]
     */
    private array $errors;

    /**
     * Constructor
     */
    public function __construct(
        array $errors
    ) {
        $this->errors = $errors;
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
            isset($data['errors']) ? array_map(fn($item) => MarketplaceApiError::fromArray($item), $data['errors']) : []
        );
    }

    /**
     * Gets errors
     *
     * @return MarketplaceApiError[]
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'errors' => array_map(fn($item) => $item->jsonSerialize(), $this->errors),
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
