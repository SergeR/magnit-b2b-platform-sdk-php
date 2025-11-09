<?php
/**
 * UpdateClaim - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

declare(strict_types=1);

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * UpdateClaim - Запрос на обновление заявки
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class UpdateClaim implements \JsonSerializable
{
    private string $claimId;
    /** @var UpdateClaimRoutePointsInner[] */
    private array $routePoints;

    /**
     * Constructor
     *
     * @param string $claimId ID заявки
     * @param UpdateClaimRoutePointsInner[] $routePoints Точки маршрута
     */
    public function __construct(string $claimId, array $routePoints)
    {
        $this->claimId = $claimId;
        $this->routePoints = $routePoints;
    }

    /**
     * Создать из массива
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        $routePoints = [];
        if (isset($data['route_points']) && is_array($data['route_points'])) {
            foreach ($data['route_points'] as $item) {
                $routePoints[] = UpdateClaimRoutePointsInner::fromArray($item);
            }
        }

        return new self(
            $data['claim_id'] ?? '',
            $routePoints
        );
    }

    /**
     * Gets claimId
     *
     * @return string
     */
    public function getClaimId(): string
    {
        return $this->claimId;
    }

    /**
     * Gets routePoints
     *
     * @return UpdateClaimRoutePointsInner[]
     */
    public function getRoutePoints(): array
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
        return [
            'claim_id' => $this->claimId,
            'route_points' => array_map(fn($item) => $item->toArray(), $this->routePoints),
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
