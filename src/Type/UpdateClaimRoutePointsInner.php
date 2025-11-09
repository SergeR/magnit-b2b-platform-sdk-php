<?php
/**
 * UpdateClaimRoutePointsInner - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

declare(strict_types=1);

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * UpdateClaimRoutePointsInner - Точка маршрута для обновления заявки
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class UpdateClaimRoutePointsInner implements \JsonSerializable
{
    private string $pointType;
    private string $transferCode;
    private UpdateClaimRoutePointsInnerAddress $address;

    /**
     * Constructor
     *
     * @param string $pointType Тип точки (source - получение, destination - доставка)
     * @param string $transferCode Код передачи
     * @param UpdateClaimRoutePointsInnerAddress $address Адрес точки
     */
    public function __construct(
        string $pointType,
        string $transferCode,
        UpdateClaimRoutePointsInnerAddress $address
    ) {
        $this->pointType = $pointType;
        $this->transferCode = $transferCode;
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
            $data['point_type'] ?? '',
            $data['transfer_code'] ?? '',
            UpdateClaimRoutePointsInnerAddress::fromArray($data['address'] ?? [])
        );
    }

    /**
     * Gets pointType
     *
     * @return string
     */
    public function getPointType(): string
    {
        return $this->pointType;
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
     * Gets address
     *
     * @return UpdateClaimRoutePointsInnerAddress
     */
    public function getAddress(): UpdateClaimRoutePointsInnerAddress
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
            'point_type' => $this->pointType,
            'transfer_code' => $this->transferCode,
            'address' => $this->address->toArray(),
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
