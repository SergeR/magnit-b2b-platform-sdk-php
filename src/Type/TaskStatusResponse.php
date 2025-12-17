<?php
/**
 * TaskStatusResponse - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * TaskStatusResponse - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class TaskStatusResponse implements \JsonSerializable
{
    /**
     * @var int
     */
    private int $countWarning;

    /**
     * @var ErrorInfo[]
     */
    private array $error;

    /**
     * @var string
     */
    private string $status;

    /**
     * @var int
     */
    private int $totalUpload;

    /**
     * @var SkuWarning[]
     */
    private array $warnings;

    /**
     * Constructor
     */
    public function __construct(
        int $countWarning,
        array $error,
        string $status,
        int $totalUpload,
        array $warnings
    ) {
        $this->countWarning = $countWarning;
        $this->error = $error;
        $this->status = $status;
        $this->totalUpload = $totalUpload;
        $this->warnings = $warnings;
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
            $data['countWarning'],
            isset($data['error']) ? array_map(fn($item) => ErrorInfo::fromArray($item), $data['error']) : [],
            $data['status'],
            $data['totalUpload'],
            isset($data['warnings']) ? array_map(fn($item) => SkuWarning::fromArray($item), $data['warnings']) : []
        );
    }

    /**
     * Gets countWarning
     *
     * @return int
     */
    public function getCountWarning(): int
    {
        return $this->countWarning;
    }

    /**
     * Gets error
     *
     * @return ErrorInfo[]
     */
    public function getError(): array
    {
        return $this->error;
    }

    /**
     * Gets status
     *
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * Gets totalUpload
     *
     * @return int
     */
    public function getTotalUpload(): int
    {
        return $this->totalUpload;
    }

    /**
     * Gets warnings
     *
     * @return SkuWarning[]
     */
    public function getWarnings(): array
    {
        return $this->warnings;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'countWarning' => $this->countWarning,
            'error' => array_map(fn($item) => $item->jsonSerialize(), $this->error),
            'status' => $this->status,
            'totalUpload' => $this->totalUpload,
            'warnings' => array_map(fn($item) => $item->jsonSerialize(), $this->warnings),
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
