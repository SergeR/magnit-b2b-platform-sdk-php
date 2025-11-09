<?php
/**
 * UpdateClaim - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * UpdateClaim - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class UpdateClaim implements \JsonSerializable
{
    /**
     * @var string
     */
    private $claimId;

    /**
     * @var UpdateClaimRoutePointsInner[]
     */
    private $routePoints;

            /**
     * Constructor
     */
    public function __construct(
        string $claimId,
        UpdateClaimRoutePointsInner[] $routePoints
    ) {
        $this->claimId = $claimId;
        $this->routePoints = $routePoints;
    }
        if (isset($data['route_points'])) {
            $this->routePoints = $data['route_points'];
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
            $data['claim_id'],
            isset($data['route_points']) ? array_map(fn($item) => UpdateClaimRoutePointsInner::fromArray($item), $data['route_points']) : []
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
     * Gets claimId
     *
     * @return string
     */
    public function getClaimId()
    {
        return $this->claimId;
    }

    /**
     * Gets routePoints
     *
     * @return UpdateClaimRoutePointsInner[]
     */
    public function getRoutePoints()
    {
        return $this->routePoints;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = [];
        
        if (isset($this->claimId)) {
            $data['claim_id'] = $this->claimId;
        }
        if (isset($this->routePoints)) {
            $data['route_points'] = array_map(function($item) {
                return $item instanceof \JsonSerializable ? $item->jsonSerialize() : $item;
            }, $this->routePoints);
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
