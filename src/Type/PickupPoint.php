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
    private ?string $shortAddress;
    private string $region;
    private string $city;
    private ?string $index;
    /** @var string[] */
    private array $phones;
    /** @var string[] */
    private array $paymentMethod;
    /** @var DayWorkHours[] */
    private array $workHours;
    private ?PickupPointCoordinates $coordinates;

    /**
     * Constructor
     *
     * @param string $key Ключ ПВЗ
     * @param string $name Название
     * @param string $type Тип
     * @param string $address Адрес
     * @param string|null $shortAddress Краткий адрес
     * @param string $region Регион
     * @param string $city Город
     * @param string|null $index Индекс
     * @param string[] $phones Телефоны
     * @param string[] $paymentMethod Способы оплаты
     * @param DayWorkHours[] $workHours Часы работы
     * @param PickupPointCoordinates|null $coordinates Координаты
     */
    public function __construct(
        string $key,
        string $name,
        string $type,
        string $address,
        ?string $shortAddress,
        string $region,
        string $city,
        ?string $index,
        array $phones,
        array $paymentMethod,
        array $workHours,
        ?PickupPointCoordinates $coordinates
    ) {
        $this->key = $key;
        $this->name = $name;
        $this->type = $type;
        $this->address = $address;
        $this->shortAddress = $shortAddress;
        $this->region = $region;
        $this->city = $city;
        $this->index = $index;
        $this->phones = $phones;
        $this->paymentMethod = $paymentMethod;
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
        if (isset($data['workHours']) && is_array($data['workHours'])) {
            foreach ($data['workHours'] as $item) {
                $workHours[] = DayWorkHours::fromArray($item);
            }
        }

        return new self(
            $data['key'],
            $data['name'],
            $data['type'],
            $data['address'],
            $data['short_address'] ?? null,
            $data['region'],
            $data['city'],
            $data['index'] ?? null,
            $data['phones'] ?? [],
            $data['payment_method'] ?? [],
            $workHours,
            isset($data['coordinates']) ? PickupPointCoordinates::fromArray($data['coordinates']) : null
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
     * Gets shortAddress
     *
     * @return string|null
     */
    public function getShortAddress(): ?string
    {
        return $this->shortAddress;
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
     * @return string|null
     */
    public function getIndex(): ?string
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
     * Gets paymentMethod
     *
     * @return string[]
     */
    public function getPaymentMethod(): array
    {
        return $this->paymentMethod;
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
     * @return PickupPointCoordinates|null
     */
    public function getCoordinates(): ?PickupPointCoordinates
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
            'short_address' => $this->shortAddress,
            'region' => $this->region,
            'city' => $this->city,
            'index' => $this->index,
            'phones' => $this->phones,
            'payment_method' => $this->paymentMethod,
            'work_hours' => array_map(fn($item) => $item->toArray(), $this->workHours),
            'coordinates' => $this->coordinates ? $this->coordinates->toArray() : null,
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
