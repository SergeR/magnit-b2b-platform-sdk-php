<?php
/**
 * UpdateClaimRoutePointsInner - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * UpdateClaimRoutePointsInner - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class UpdateClaimRoutePointsInner implements \JsonSerializable
{
    /**
     * @var RoutePointType
     */
    private $pointType;

    /**
     * @var string
     */
    private $transferCode;

    /**
     * @var UpdateClaimRoutePointsInnerAddress
     */
    private $address;

            /**
     * Constructor
     */
    public function __construct(
        RoutePointType $pointType,
        string $transferCode,
        UpdateClaimRoutePointsInnerAddress $address
    ) {
        $this->pointType = $pointType;
        $this->transferCode = $transferCode;
        $this->address = $address;
    }
        if (isset($data['transfer_code'])) {
            $this->transferCode = $data['transfer_code'];
        }
        if (isset($data['address'])) {
            $this->address = $data['address'];
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
            $data['transfer_code'],
            UpdateClaimRoutePointsInnerAddress::fromArray($data['address'])
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
     * Gets transferCode
     *
     * @return string
     */
    public function getTransferCode()
    {
        return $this->transferCode;
    }

    /**
     * Gets address
     *
     * @return UpdateClaimRoutePointsInnerAddress
     */
    public function getAddress()
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
        $data = [];
        
        if (isset($this->pointType)) {
            $data['point_type'] = $this->pointType;
        }
        if (isset($this->transferCode)) {
            $data['transfer_code'] = $this->transferCode;
        }
        if (isset($this->address)) {
            $data['address'] = $this->address;
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
