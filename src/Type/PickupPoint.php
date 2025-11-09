<?php
/**
 * PickupPoint - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

declare(strict_types=1);

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * PickupPoint - Пункт выдачи заказов
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class PickupPoint implements \JsonSerializable
{
    private string $key;
    private string $name;
    private string $type;
    private string $address;
    private string $region;
    private string $city;
    private string $index;
    /** @var string[] */
    private array $phones;
    /** @var DayWorkHours[] */
    private array $workHours;
    private PickupPointCoordinates $coordinates;

    /**
     * Constructor
     *
     * @param string $key Ключ ПВЗ
     * @param string $name Название
     * @param string $type Тип
     * @param string $address Адрес
     * @param string $region Регион
     * @param string $city Город
     * @param string $index Индекс
     * @param string[] $phones Телефоны
     * @param DayWorkHours[] $workHours Часы работы
     * @param PickupPointCoordinates $coordinates Координаты
     */
    public function __construct(
        string $key,
        string $name,
        string $type,
        string $address,
        string $region,
        string $city,
        string $index,
        array $phones,
        array $workHours,
        PickupPointCoordinates $coordinates
    ) {
        $this->key = $key;
        $this->name = $name;
        $this->type = $type;
        $this->address = $address;
        $this->region = $region;
        $this->city = $city;
        $this->index = $index;
        $this->phones = $phones;
        $this->workHours = $workHours;
        $this->coordinates = $coordinates;
    }

    /**
     * Создать из массива
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        $workHours = [];
        if (isset($data['work_hours']) && is_array($data['work_hours'])) {
            foreach ($data['work_hours'] as $item) {
                $workHours[] = DayWorkHours::fromArray($item);
            }
        }

        return new self(
            $data['key'],
            $data['name'],
            $data['type'],
            $data['address'],
            $data['region'],
            $data['city'],
            $data['index'],
            $data['phones'] ?? [],
            $workHours,
            PickupPointCoordinates::fromArray($data['coordinates'])
        );
    }

    /**
     * Gets key
     *
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
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
     * Gets type
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Gets address
     *
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * Gets region
     *
     * @return string
     */
    public function getRegion(): string
    {
        return $this->region;
    }

    /**
     * Gets city
     *
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * Gets index
     *
     * @return string
     */
    public function getIndex(): string
    {
        return $this->index;
    }

    /**
     * Gets phones
     *
     * @return string[]
     */
    public function getPhones(): array
    {
        return $this->phones;
    }

    /**
     * Gets workHours
     *
     * @return DayWorkHours[]
     */
    public function getWorkHours(): array
    {
        return $this->workHours;
    }

    /**
     * Gets coordinates
     *
     * @return PickupPointCoordinates
     */
    public function getCoordinates(): PickupPointCoordinates
    {
        return $this->coordinates;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'key' => $this->key,
            'name' => $this->name,
            'type' => $this->type,
            'address' => $this->address,
            'region' => $this->region,
            'city' => $this->city,
            'index' => $this->index,
            'phones' => $this->phones,
            'work_hours' => array_map(fn($item) => $item->toArray(), $this->workHours),
            'coordinates' => $this->coordinates->toArray(),
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
