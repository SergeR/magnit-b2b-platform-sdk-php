<?php
/**
 * PartnerConfigPickupPointArrivalInterval - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

declare(strict_types=1);

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * PartnerConfigPickupPointArrivalInterval - Интервал прибытия в пункт выдачи
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class PartnerConfigPickupPointArrivalInterval implements \JsonSerializable
{
    private string $lowerBorder;
    private string $upperBorder;

    /**
     * Constructor
     *
     * @param string $lowerBorder Нижняя граница интервала
     * @param string $upperBorder Верхняя граница интервала
     */
    public function __construct(string $lowerBorder, string $upperBorder)
    {
        $this->lowerBorder = $lowerBorder;
        $this->upperBorder = $upperBorder;
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
            $data['lower_border'] ?? '',
            $data['upper_border'] ?? ''
        );
    }

    /**
     * Gets lowerBorder
     *
     * @return string
     */
    public function getLowerBorder(): string
    {
        return $this->lowerBorder;
    }

    /**
     * Gets upperBorder
     *
     * @return string
     */
    public function getUpperBorder(): string
    {
        return $this->upperBorder;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'lower_border' => $this->lowerBorder,
            'upper_border' => $this->upperBorder,
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
