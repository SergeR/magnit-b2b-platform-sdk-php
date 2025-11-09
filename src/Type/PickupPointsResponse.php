<?php
/**
 * PickupPointsResponse - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

declare(strict_types=1);

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * PickupPointsResponse - Ответ со списком пунктов выдачи
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class PickupPointsResponse implements \JsonSerializable
{
    /** @var PickupPoint[] */
    private array $pickupPoints;
    private Pager $pager;

    /**
     * Constructor
     *
     * @param PickupPoint[] $pickupPoints Список пунктов выдачи
     * @param Pager $pager Информация о пагинации
     */
    public function __construct(array $pickupPoints, Pager $pager)
    {
        $this->pickupPoints = $pickupPoints;
        $this->pager = $pager;
    }

    /**
     * Создать из массива
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        $pickupPoints = [];
        if (isset($data['pickup_points']) && is_array($data['pickup_points'])) {
            foreach ($data['pickup_points'] as $item) {
                $pickupPoints[] = PickupPoint::fromArray($item);
            }
        }

        return new self(
            $pickupPoints,
            Pager::fromArray($data['pager'])
        );
    }

    /**
     * Gets pickupPoints
     *
     * @return PickupPoint[]
     */
    public function getPickupPoints(): array
    {
        return $this->pickupPoints;
    }

    /**
     * Gets pager
     *
     * @return Pager
     */
    public function getPager(): Pager
    {
        return $this->pager;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'pickup_points' => array_map(fn($item) => $item->toArray(), $this->pickupPoints),
            'pager' => $this->pager->toArray(),
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
