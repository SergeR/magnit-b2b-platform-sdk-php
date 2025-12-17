<?php
/**
 * ResponseBadRequest - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * ResponseBadRequest - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class ResponseBadRequest implements \JsonSerializable
{
    /**
     * @var string
     */
    private string $code;

    /**
     * @var string[]
     */
    private array $details;

    /**
     * Constructor
     */
    public function __construct(
        string $code,
        array $details
    ) {
        $this->code = $code;
        $this->details = $details;
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
            $data['code'],
            $data['details']
        );
    }

    /**
     * Gets code
     *
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * Gets details
     *
     * @return string[]
     */
    public function getDetails(): array
    {
        return $this->details;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'code' => $this->code,
            'details' => $this->details,
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
