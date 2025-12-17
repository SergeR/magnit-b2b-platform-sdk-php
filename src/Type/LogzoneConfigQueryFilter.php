<?php
/**
 * LogzoneConfigQueryFilter - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * LogzoneConfigQueryFilter - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class LogzoneConfigQueryFilter implements \JsonSerializable
{
    /**
     * @var string
     */
    private string $name;

    /**
     * @var string
     */
    private string $externalId;

    /**
     * @var Point
     */
    private Point $point;

    /**
     * Constructor
     */
    public function __construct(
        string $name,
        string $externalId,
        Point $point
    ) {
        $this->name = $name;
        $this->externalId = $externalId;
        $this->point = $point;
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
            $data['name'],
            $data['externalId'],
            Point::fromArray($data['point'])
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
     * Gets externalId
     *
     * @return string
     */
    public function getExternalId(): string
    {
        return $this->externalId;
    }

    /**
     * Gets point
     *
     * @return Point
     */
    public function getPoint(): Point
    {
        return $this->point;
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
            'externalId' => $this->externalId,
            'point' => $this->point,
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
