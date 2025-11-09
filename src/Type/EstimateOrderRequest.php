<?php
/**
 * EstimateOrderRequest - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * EstimateOrderRequest - Запрос на расчет стоимости доставки
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class EstimateOrderRequest implements \JsonSerializable
{
    private string $pupRegion;
    private string $pupCity;
    private ?string $pupKey;
    private ?string $pupName;
    private string $cityFrom;

    /**
     * Constructor
     *
     * @param string $pupRegion Регион ПВЗ
     * @param string $pupCity Город ПВЗ
     * @param string $cityFrom Город отправления
     * @param string|null $pupKey Ключ ПВЗ (опционально)
     * @param string|null $pupName Название ПВЗ (опционально)
     */
    public function __construct(
        string $pupRegion,
        string $pupCity,
        string $cityFrom,
        ?string $pupKey = null,
        ?string $pupName = null
    ) {
        $this->pupRegion = $pupRegion;
        $this->pupCity = $pupCity;
        $this->pupKey = $pupKey;
        $this->pupName = $pupName;
        $this->cityFrom = $cityFrom;
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
            $data['pup_region'],
            $data['pup_city'],
            $data['city_from'],
            $data['pup_key'] ?? null,
            $data['pup_name'] ?? null
        );
    }

    /**
     * Gets pupRegion
     *
     * @return string
     */
    public function getPupRegion(): string
    {
        return $this->pupRegion;
    }

    /**
     * Gets pupCity
     *
     * @return string
     */
    public function getPupCity(): string
    {
        return $this->pupCity;
    }

    /**
     * Gets pupKey
     *
     * @return string|null
     */
    public function getPupKey(): ?string
    {
        return $this->pupKey;
    }

    /**
     * Gets pupName
     *
     * @return string|null
     */
    public function getPupName(): ?string
    {
        return $this->pupName;
    }

    /**
     * Gets cityFrom
     *
     * @return string
     */
    public function getCityFrom(): string
    {
        return $this->cityFrom;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = [
            'pup_region' => $this->pupRegion,
            'pup_city' => $this->pupCity,
            'city_from' => $this->cityFrom,
        ];
        
        if ($this->pupKey !== null) {
            $data['pup_key'] = $this->pupKey;
        }
        if ($this->pupName !== null) {
            $data['pup_name'] = $this->pupName;
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
}
