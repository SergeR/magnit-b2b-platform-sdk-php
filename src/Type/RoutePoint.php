<?php
/**
 * RoutePoint - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * RoutePoint - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class RoutePoint implements \JsonSerializable
{
    /**
     * @var RoutePointType
     */
    private $pointType;

    /**
     * @var Address
     */
    private $address;

    /**
     * @var Contact
     */
    private $contact;

    /**
     * @var string
     */
    private $transferCode;

            /**
     * Constructor
     */
    public function __construct(
        RoutePointType $pointType,
        Address $address,
        Contact $contact,
        string $transferCode
    ) {
        $this->pointType = $pointType;
        $this->address = $address;
        $this->contact = $contact;
        $this->transferCode = $transferCode;
    }
        if (isset($data['address'])) {
            $this->address = $data['address'];
        }
        if (isset($data['contact'])) {
            $this->contact = $data['contact'];
        }
        if (isset($data['transfer_code'])) {
            $this->transferCode = $data['transfer_code'];
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
            RoutePointType::fromArray($data['point_type']),
            Address::fromArray($data['address']),
            Contact::fromArray($data['contact']),
            $data['transfer_code']
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
     * Gets pointType
     *
     * @return RoutePointType
     */
    public function getPointType()
    {
        return $this->pointType;
    }

    /**
     * Gets address
     *
     * @return Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Gets contact
     *
     * @return Contact
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Gets transferCode
     *
     * @return string
     */
    public function getTransferCode()
    {
        return $this->transferCode;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = [];
        
        if (isset($this->pointType)) {
            $data['point_type'] = $this->pointType;
        }
        if (isset($this->address)) {
            $data['address'] = $this->address;
        }
        if (isset($this->contact)) {
            $data['contact'] = $this->contact;
        }
        if (isset($this->transferCode)) {
            $data['transfer_code'] = $this->transferCode;
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
