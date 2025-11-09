<?php
/**
 * OauthError - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * OauthError - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class OauthError implements \JsonSerializable
{
    /**
     * @var string
     */
    private $error;

    /**
     * @var string
     */
    private $errorDescription;

    /**
     * @var string
     */
    private $message;

    /**
     * Constructor
     *
     * @param string $error
     * @param string $errorDescription
     * @param string $message
     */
    public function __construct(
        string $error,
        string $errorDescription,
        string $message
    ) {
        $this->error = $error;
        $this->errorDescription = $errorDescription;
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
            $data['error'] ?? '',
            $data['error_description'] ?? '',
            $data['message'] ?? ''
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
        return self::fromArray($data ?? []);
    }

    /**
     * Gets error
     *
     * @return string
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * Gets errorDescription
     *
     * @return string
     */
    public function getErrorDescription()
    {
        return $this->errorDescription;
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
        
        if (isset($this->error)) {
            $data['error'] = $this->error;
        }
        if (isset($this->errorDescription)) {
            $data['error_description'] = $this->errorDescription;
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
