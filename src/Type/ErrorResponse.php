<?php
/**
 * ErrorResponse - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * ErrorResponse - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class ErrorResponse implements \JsonSerializable
{
    /**
     * @var ErrorCodeEnum
     */
    private ErrorCodeEnum $code;

    /**
     * @var string
     */
    private string $message;

    /**
     * Constructor
     */
    public function __construct(
        ErrorCodeEnum $code,
        string $message
    ) {
        $this->code = $code;
        $this->message = $message;
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
            ErrorCodeEnum::fromArray($data['code']),
            $data['message']
        );
    }

    /**
     * Gets code
     *
     * @return ErrorCodeEnum
     */
    public function getCode(): ErrorCodeEnum
    {
        return $this->code;
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
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'code' => $this->code,
            'message' => $this->message,
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
