<?php
/**
 * ClaimsEventStatusChangedPayload - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

declare(strict_types=1);

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * ClaimsEventStatusChangedPayload - Данные события изменения статуса заявки
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class ClaimsEventStatusChangedPayload implements \JsonSerializable
{
    private string $name;
    private string $phone;
    private string $code;
    private string $message;

    /**
     * Constructor
     *
     * @param string $name Имя
     * @param string $phone Телефон
     * @param string $code Код причины
     * @param string $message Сообщение
     */
    public function __construct(
        string $name,
        string $phone,
        string $code,
        string $message
    ) {
        $this->name = $name;
        $this->phone = $phone;
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
            $data['name'] ?? '',
            $data['phone'] ?? '',
            $data['code'] ?? '',
            $data['message'] ?? ''
        );
    }

    /**
     * Gets name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Gets phone
     *
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
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
            'name' => $this->name,
            'phone' => $this->phone,
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
