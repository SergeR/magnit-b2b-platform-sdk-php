<?php
/**
 * BadRequestStoresStockDelta - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

declare(strict_types=1);

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * BadRequestStoresStockDelta - Ошибка запроса дельты остатков
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class BadRequestStoresStockDelta implements \JsonSerializable
{
    private string $error;
    private string $message;

    /**
     * Constructor
     *
     * @param string $error Код ошибки
     * @param string $message Сообщение об ошибке
     */
    public function __construct(string $error, string $message)
    {
        $this->error = $error;
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
            $data['message'] ?? ''
        );
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
