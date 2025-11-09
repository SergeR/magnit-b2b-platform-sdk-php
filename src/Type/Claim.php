<?php
/**
 * Claim - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

declare(strict_types=1);

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * Claim - Заявка на доставку
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class Claim implements \JsonSerializable
{
    private string $externalOrderId;
    private Items $items;
    private \DateTime $dueTime;
    /** @var RoutePoint[] */
    private array $routePoints;
    private ClaimState $state;
    private CourierInfo $courierInfo;
    private Estimation $estimation;
    private bool $needReturn;
    private string $comment;
    private ClaimMeta $meta;

    /**
     * Constructor
     *
     * @param string $externalOrderId Внешний ID заказа
     * @param Items $items Товары
     * @param \DateTime $dueTime Срок доставки
     * @param RoutePoint[] $routePoints Точки маршрута
     * @param ClaimState $state Состояние заявки
     * @param CourierInfo $courierInfo Информация о курьере
     * @param Estimation $estimation Оценка доставки
     * @param bool $needReturn Нужен возврат
     * @param string $comment Комментарий
     * @param ClaimMeta $meta Метаданные
     */
    public function __construct(
        string $externalOrderId,
        Items $items,
        \DateTime $dueTime,
        array $routePoints,
        ClaimState $state,
        CourierInfo $courierInfo,
        Estimation $estimation,
        bool $needReturn,
        string $comment,
        ClaimMeta $meta
    ) {
        $this->externalOrderId = $externalOrderId;
        $this->items = $items;
        $this->dueTime = $dueTime;
        $this->routePoints = $routePoints;
        $this->state = $state;
        $this->courierInfo = $courierInfo;
        $this->estimation = $estimation;
        $this->needReturn = $needReturn;
        $this->comment = $comment;
        $this->meta = $meta;
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
                $routePoints[] = RoutePoint::fromArray($item);
            }
        }

        return new self(
            $data['external_order_id'] ?? '',
            Items::fromArray($data['items'] ?? []),
            new \DateTime($data['due_time'] ?? 'now'),
            $routePoints,
            ClaimState::fromArray($data['state'] ?? []),
            CourierInfo::fromArray($data['courier_info'] ?? []),
            Estimation::fromArray($data['estimation'] ?? []),
            $data['need_return'] ?? false,
            $data['comment'] ?? '',
            ClaimMeta::fromArray($data['meta'] ?? [])
        );
    }

    /**
     * Gets externalOrderId
     *
     * @return string
     */
    public function getExternalOrderId(): string
    {
        return $this->externalOrderId;
    }

    /**
     * Gets items
     *
     * @return Items
     */
    public function getItems(): Items
    {
        return $this->items;
    }

    /**
     * Gets dueTime
     *
     * @return \DateTime
     */
    public function getDueTime(): \DateTime
    {
        return $this->dueTime;
    }

    /**
     * Gets routePoints
     *
     * @return RoutePoint[]
     */
    public function getRoutePoints(): array
    {
        return $this->routePoints;
    }

    /**
     * Gets state
     *
     * @return ClaimState
     */
    public function getState(): ClaimState
    {
        return $this->state;
    }

    /**
     * Gets courierInfo
     *
     * @return CourierInfo
     */
    public function getCourierInfo(): CourierInfo
    {
        return $this->courierInfo;
    }

    /**
     * Gets estimation
     *
     * @return Estimation
     */
    public function getEstimation(): Estimation
    {
        return $this->estimation;
    }

    /**
     * Gets needReturn
     *
     * @return bool
     */
    public function getNeedReturn(): bool
    {
        return $this->needReturn;
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
     * Gets meta
     *
     * @return ClaimMeta
     */
    public function getMeta(): ClaimMeta
    {
        return $this->meta;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'external_order_id' => $this->externalOrderId,
            'items' => $this->items->toArray(),
            'due_time' => $this->dueTime->format(\DateTime::ATOM),
            'route_points' => array_map(fn($item) => $item->toArray(), $this->routePoints),
            'state' => $this->state->toArray(),
            'courier_info' => $this->courierInfo->toArray(),
            'estimation' => $this->estimation->toArray(),
            'need_return' => $this->needReturn,
            'comment' => $this->comment,
            'meta' => $this->meta->toArray(),
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
