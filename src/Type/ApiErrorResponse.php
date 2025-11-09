<?php
/**
 * ApiErrorResponse - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

declare(strict_types=1);

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * ApiErrorResponse - Ответ с ошибкой API
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class ApiErrorResponse implements \JsonSerializable
{
    private string $code;
    private string $detailMessage;
    private string $message;
    private array $payload;

    /**
     * Constructor
     *
     * @param string $code Код ошибки
     * @param string $detailMessage Детальное сообщение
     * @param string $message Сообщение об ошибке
     * @param array $payload Дополнительные данные
     */
    public function __construct(
        string $code,
        string $detailMessage,
        string $message,
        array $payload = []
    ) {
        $this->code = $code;
        $this->detailMessage = $detailMessage;
        $this->message = $message;
        $this->payload = $payload;
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
            $data['code'] ?? '',
            $data['detail_message'] ?? $data['detailMessage'] ?? '',
            $data['message'] ?? '',
            $data['payload'] ?? []
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
     * Gets detailMessage
     *
     * @return string
     */
    public function getDetailMessage(): string
    {
        return $this->detailMessage;
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
     * Gets payload
     *
     * @return array
     */
    public function getPayload(): array
    {
        return $this->payload;
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
            'detail_message' => $this->detailMessage,
            'message' => $this->message,
            'payload' => $this->payload,
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
