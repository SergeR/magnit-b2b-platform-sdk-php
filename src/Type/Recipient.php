<?php
/**
 * Recipient - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * Recipient - Получатель заказа
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class Recipient implements \JsonSerializable
{
    private string $firstName;
    private string $familyName;
    private string $phoneNumber;
    private string $address;

    /**
     * Constructor
     *
     * @param string $firstName Имя
     * @param string $familyName Фамилия
     * @param string $phoneNumber Номер телефона
     * @param string $address Адрес
     */
    public function __construct(
        string $firstName,
        string $familyName,
        string $phoneNumber,
        string $address
    ) {
        $this->firstName = $firstName;
        $this->familyName = $familyName;
        $this->phoneNumber = $phoneNumber;
        $this->address = $address;
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
            $data['first_name'],
            $data['family_name'],
            $data['phone_number'],
            $data['address']
        );
    }

    /**
     * Gets firstName
     *
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * Gets familyName
     *
     * @return string
     */
    public function getFamilyName(): string
    {
        return $this->familyName;
    }

    /**
     * Gets phoneNumber
     *
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
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
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'first_name' => $this->firstName,
            'family_name' => $this->familyName,
            'phone_number' => $this->phoneNumber,
            'address' => $this->address,
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
