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
    private $code;

    /**
     * @var string
     */
    private $message;

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
        if (isset($data['message'])) {
            $this->message = $data['message'];
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
            ErrorCodes::fromArray($data['code']),
            $data['message']
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
     * Gets code
     *
     * @return ErrorCodes
     */
    public function getCode()
    {
        return $this->code;
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
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = [];
        
        if (isset($this->code)) {
            $data['code'] = $this->code;
        }
        if (isset($this->message)) {
            $data['message'] = $this->message;
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
