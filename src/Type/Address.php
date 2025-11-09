<?php
/**
 * Address - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

declare(strict_types=1);

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * Address - Адрес доставки
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class Address implements \JsonSerializable
{
    private string $fullName;
    private Coordinates $coordinates;
    private string $floor;
    private string $flat;
    private string $porch;
    private string $doorCode;
    private string $comment;

    /**
     * Constructor
     *
     * @param string $fullName Полный адрес
     * @param Coordinates $coordinates Координаты
     * @param string $floor Этаж
     * @param string $flat Квартира
     * @param string $porch Подъезд
     * @param string $doorCode Код домофона
     * @param string $comment Комментарий
     */
    public function __construct(
        string $fullName,
        Coordinates $coordinates,
        string $floor,
        string $flat,
        string $porch,
        string $doorCode,
        string $comment
    ) {
        $this->fullName = $fullName;
        $this->coordinates = $coordinates;
        $this->floor = $floor;
        $this->flat = $flat;
        $this->porch = $porch;
        $this->doorCode = $doorCode;
        $this->comment = $comment;
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
            $data['full_name'],
            Coordinates::fromArray($data['coordinates']),
            $data['floor'],
            $data['flat'],
            $data['porch'],
            $data['door_code'],
            $data['comment']
        );
    }

    /**
     * Gets fullName
     *
     * @return string
     */
    public function getFullName(): string
    {
        return $this->fullName;
    }

    /**
     * Gets coordinates
     *
     * @return Coordinates
     */
    public function getCoordinates(): Coordinates
    {
        return $this->coordinates;
    }

    /**
     * Gets floor
     *
     * @return string
     */
    public function getFloor(): string
    {
        return $this->floor;
    }

    /**
     * Gets flat
     *
     * @return string
     */
    public function getFlat(): string
    {
        return $this->flat;
    }

    /**
     * Gets porch
     *
     * @return string
     */
    public function getPorch(): string
    {
        return $this->porch;
    }

    /**
     * Gets doorCode
     *
     * @return string
     */
    public function getDoorCode(): string
    {
        return $this->doorCode;
    }

    /**
     * Gets comment
     *
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'full_name' => $this->fullName,
            'coordinates' => $this->coordinates->toArray(),
            'floor' => $this->floor,
            'flat' => $this->flat,
            'porch' => $this->porch,
            'door_code' => $this->doorCode,
            'comment' => $this->comment,
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
