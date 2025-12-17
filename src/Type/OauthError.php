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
    private string $error;

    /**
     * @var string
     */
    private string $errorDescription;

    /**
     * @var string
     */
    private string $message;

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
    public function getError(): string
    {
        return $this->error;
    }

    /**
     * Gets errorDescription
     *
     * @return string
     */
    public function getErrorDescription(): string
    {
        return $this->errorDescription;
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
            'error' => $this->error,
            'errorDescription' => $this->errorDescription,
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
