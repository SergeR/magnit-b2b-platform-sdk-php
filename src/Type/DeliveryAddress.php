<?php
/**
 * DeliveryAddress - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * DeliveryAddress - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class DeliveryAddress implements \JsonSerializable
{
    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $street;

    /**
     * @var string
     */
    private $building;

    /**
     * @var string
     */
    private $entrance;

    /**
     * @var string
     */
    private $floor;

    /**
     * @var string
     */
    private $flat;

    /**
     * @var string
     */
    private $intercom;

    /**
     * @var string
     */
    private $full;

            /**
     * Constructor
     */
    public function __construct(
        string $city,
        string $street,
        string $building,
        string $entrance,
        string $floor,
        string $flat,
        string $intercom,
        string $full
    ) {
        $this->city = $city;
        $this->street = $street;
        $this->building = $building;
        $this->entrance = $entrance;
        $this->floor = $floor;
        $this->flat = $flat;
        $this->intercom = $intercom;
        $this->full = $full;
    }
        if (isset($data['street'])) {
            $this->street = $data['street'];
        }
        if (isset($data['building'])) {
            $this->building = $data['building'];
        }
        if (isset($data['entrance'])) {
            $this->entrance = $data['entrance'];
        }
        if (isset($data['floor'])) {
            $this->floor = $data['floor'];
        }
        if (isset($data['flat'])) {
            $this->flat = $data['flat'];
        }
        if (isset($data['intercom'])) {
            $this->intercom = $data['intercom'];
        }
        if (isset($data['full'])) {
            $this->full = $data['full'];
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
            $data['city'],
            $data['street'],
            $data['building'],
            $data['entrance'],
            $data['floor'],
            $data['flat'],
            $data['intercom'],
            $data['full']
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
     * Gets city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Gets street
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Gets building
     *
     * @return string
     */
    public function getBuilding()
    {
        return $this->building;
    }

    /**
     * Gets entrance
     *
     * @return string
     */
    public function getEntrance()
    {
        return $this->entrance;
    }

    /**
     * Gets floor
     *
     * @return string
     */
    public function getFloor()
    {
        return $this->floor;
    }

    /**
     * Gets flat
     *
     * @return string
     */
    public function getFlat()
    {
        return $this->flat;
    }

    /**
     * Gets intercom
     *
     * @return string
     */
    public function getIntercom()
    {
        return $this->intercom;
    }

    /**
     * Gets full
     *
     * @return string
     */
    public function getFull()
    {
        return $this->full;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = [];
        
        if (isset($this->city)) {
            $data['city'] = $this->city;
        }
        if (isset($this->street)) {
            $data['street'] = $this->street;
        }
        if (isset($this->building)) {
            $data['building'] = $this->building;
        }
        if (isset($this->entrance)) {
            $data['entrance'] = $this->entrance;
        }
        if (isset($this->floor)) {
            $data['floor'] = $this->floor;
        }
        if (isset($this->flat)) {
            $data['flat'] = $this->flat;
        }
        if (isset($this->intercom)) {
            $data['intercom'] = $this->intercom;
        }
        if (isset($this->full)) {
            $data['full'] = $this->full;
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
