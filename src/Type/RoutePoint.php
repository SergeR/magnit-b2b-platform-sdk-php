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
    private RoutePointType $pointType;

    /**
     * @var Address
     */
    private Address $address;

    /**
     * @var Contact
     */
    private Contact $contact;

    /**
     * @var string
     */
    private string $transferCode;

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

    /**
     * Создать из массива
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self(
            RoutePointType::fromArray($data['pointType']),
            Address::fromArray($data['address']),
            Contact::fromArray($data['contact']),
            $data['transferCode']
        );
    }

    /**
     * Gets pointType
     *
     * @return RoutePointType
     */
    public function getPointType(): RoutePointType
    {
        return $this->pointType;
    }

    /**
     * Gets address
     *
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * Gets contact
     *
     * @return Contact
     */
    public function getContact(): Contact
    {
        return $this->contact;
    }

    /**
     * Gets transferCode
     *
     * @return string
     */
    public function getTransferCode(): string
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
        return [
            'pointType' => $this->pointType,
            'address' => $this->address,
            'contact' => $this->contact,
            'transferCode' => $this->transferCode,
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
