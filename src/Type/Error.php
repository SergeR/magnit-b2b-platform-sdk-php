<?php
/**
 * Error - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * Error - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class Error implements \JsonSerializable
{
    /**
     * @var ErrorCodes
     */
    private ErrorCodes $code;

    /**
     * @var string
     */
    private string $message;

    /**
     * Constructor
     */
    public function __construct(
        ErrorCodes $code,
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
            ErrorCodes::fromArray($data['code']),
            $data['message']
        );
    }

    /**
     * Gets code
     *
     * @return ErrorCodes
     */
    public function getCode(): ErrorCodes
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
