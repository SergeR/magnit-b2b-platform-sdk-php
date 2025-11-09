<?php
/**
 * GenericResponse - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

declare(strict_types=1);

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * GenericResponse - Общий ответ с ошибками
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class GenericResponse implements \JsonSerializable
{
    private string $error;
    /** @var ApiErrorResponse[] */
    private array $errors;
    private array $payload;
    private \DateTime $timestamp;
    private string $trace;

    /**
     * Constructor
     *
     * @param string $error Сообщение об ошибке
     * @param ApiErrorResponse[] $errors Список ошибок
     * @param array $payload Дополнительные данные
     * @param \DateTime $timestamp Временная метка
     * @param string $trace Трассировка
     */
    public function __construct(
        string $error,
        array $errors,
        array $payload,
        \DateTime $timestamp,
        string $trace
    ) {
        $this->error = $error;
        $this->errors = $errors;
        $this->payload = $payload;
        $this->timestamp = $timestamp;
        $this->trace = $trace;
    }

    /**
     * Создать из массива
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        $errors = [];
        if (isset($data['errors']) && is_array($data['errors'])) {
            foreach ($data['errors'] as $item) {
                $errors[] = ApiErrorResponse::fromArray($item);
            }
        }

        return new self(
            $data['error'] ?? '',
            $errors,
            $data['payload'] ?? [],
            new \DateTime($data['timestamp'] ?? 'now'),
            $data['trace'] ?? ''
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
     * Gets errors
     *
     * @return ApiErrorResponse[]
     */
    public function getErrors(): array
    {
        return $this->errors;
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
     * Gets timestamp
     *
     * @return \DateTime
     */
    public function getTimestamp(): \DateTime
    {
        return $this->timestamp;
    }

    /**
     * Gets trace
     *
     * @return string
     */
    public function getTrace(): string
    {
        return $this->trace;
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
            'errors' => array_map(fn($item) => $item->toArray(), $this->errors),
            'payload' => $this->payload,
            'timestamp' => $this->timestamp->format(\DateTime::ATOM),
            'trace' => $this->trace,
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
