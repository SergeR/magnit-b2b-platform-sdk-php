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
    private $countWarning;

    /**
     * @var ErrorInfo[]
     */
    private $error;

    /**
     * @var string
     */
    private $status;

    /**
     * @var int
     */
    private $totalUpload;

    /**
     * @var SkuWarning[]
     */
    private $warnings;

            /**
     * Constructor
     */
    public function __construct(
        int $countWarning,
        ErrorInfo[] $error,
        string $status,
        int $totalUpload,
        SkuWarning[] $warnings
    ) {
        $this->countWarning = $countWarning;
        $this->error = $error;
        $this->status = $status;
        $this->totalUpload = $totalUpload;
        $this->warnings = $warnings;
    }
        if (isset($data['error'])) {
            $this->error = $data['error'];
        }
        if (isset($data['status'])) {
            $this->status = $data['status'];
        }
        if (isset($data['total_upload'])) {
            $this->totalUpload = $data['total_upload'];
        }
        if (isset($data['warnings'])) {
            $this->warnings = $data['warnings'];
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
            $data['count_warning'],
            isset($data['error']) ? array_map(fn($item) => ErrorInfo::fromArray($item), $data['error']) : [],
            $data['status'],
            $data['total_upload'],
            isset($data['warnings']) ? array_map(fn($item) => SkuWarning::fromArray($item), $data['warnings']) : []
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
     * Gets countWarning
     *
     * @return int
     */
    public function getCountWarning()
    {
        return $this->countWarning;
    }

    /**
     * Gets error
     *
     * @return ErrorInfo[]
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * Gets status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Gets totalUpload
     *
     * @return int
     */
    public function getTotalUpload()
    {
        return $this->totalUpload;
    }

    /**
     * Gets warnings
     *
     * @return SkuWarning[]
     */
    public function getWarnings()
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
        $data = [];
        
        if (isset($this->countWarning)) {
            $data['count_warning'] = $this->countWarning;
        }
        if (isset($this->error)) {
            $data['error'] = array_map(function($item) {
                return $item instanceof \JsonSerializable ? $item->jsonSerialize() : $item;
            }, $this->error);
        }
        if (isset($this->status)) {
            $data['status'] = $this->status;
        }
        if (isset($this->totalUpload)) {
            $data['total_upload'] = $this->totalUpload;
        }
        if (isset($this->warnings)) {
            $data['warnings'] = array_map(function($item) {
                return $item instanceof \JsonSerializable ? $item->jsonSerialize() : $item;
            }, $this->warnings);
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
