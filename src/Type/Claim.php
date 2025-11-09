<?php
/**
 * Claim - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * Claim - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class Claim implements \JsonSerializable
{
    /**
     * @var string
     */
    private $externalOrderId;

    /**
     * @var Items
     */
    private $items;

    /**
     * @var \DateTime
     */
    private $dueTime;

    /**
     * @var RoutePoint[]
     */
    private $routePoints;

    /**
     * @var ClaimState
     */
    private $state;

    /**
     * @var CourierInfo
     */
    private $courierInfo;

    /**
     * @var Estimation
     */
    private $estimation;

    /**
     * @var bool
     */
    private $needReturn;

    /**
     * @var string
     */
    private $comment;

    /**
     * @var ClaimMeta
     */
    private $meta;

            /**
     * Constructor
     */
    public function __construct(
        string $externalOrderId,
        Items $items,
        \DateTime $dueTime,
        RoutePoint[] $routePoints,
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
        if (isset($data['items'])) {
            $this->items = $data['items'];
        }
        if (isset($data['due_time'])) {
            $this->dueTime = $data['due_time'];
        }
        if (isset($data['route_points'])) {
            $this->routePoints = $data['route_points'];
        }
        if (isset($data['state'])) {
            $this->state = $data['state'];
        }
        if (isset($data['courier_info'])) {
            $this->courierInfo = $data['courier_info'];
        }
        if (isset($data['estimation'])) {
            $this->estimation = $data['estimation'];
        }
        if (isset($data['need_return'])) {
            $this->needReturn = $data['need_return'];
        }
        if (isset($data['comment'])) {
            $this->comment = $data['comment'];
        }
        if (isset($data['meta'])) {
            $this->meta = $data['meta'];
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
            $data['external_order_id'],
            Items::fromArray($data['items']),
            \DateTime::fromArray($data['due_time']),
            isset($data['route_points']) ? array_map(fn($item) => RoutePoint::fromArray($item), $data['route_points']) : [],
            ClaimState::fromArray($data['state']),
            CourierInfo::fromArray($data['courier_info']),
            Estimation::fromArray($data['estimation']),
            $data['need_return'],
            $data['comment'],
            ClaimMeta::fromArray($data['meta'])
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
     * Gets externalOrderId
     *
     * @return string
     */
    public function getExternalOrderId()
    {
        return $this->externalOrderId;
    }

    /**
     * Gets items
     *
     * @return Items
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Gets dueTime
     *
     * @return \DateTime
     */
    public function getDueTime()
    {
        return $this->dueTime;
    }

    /**
     * Gets routePoints
     *
     * @return RoutePoint[]
     */
    public function getRoutePoints()
    {
        return $this->routePoints;
    }

    /**
     * Gets state
     *
     * @return ClaimState
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Gets courierInfo
     *
     * @return CourierInfo
     */
    public function getCourierInfo()
    {
        return $this->courierInfo;
    }

    /**
     * Gets estimation
     *
     * @return Estimation
     */
    public function getEstimation()
    {
        return $this->estimation;
    }

    /**
     * Gets needReturn
     *
     * @return bool
     */
    public function getNeedReturn()
    {
        return $this->needReturn;
    }

    /**
     * Gets comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Gets meta
     *
     * @return ClaimMeta
     */
    public function getMeta()
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
        $data = [];
        
        if (isset($this->externalOrderId)) {
            $data['external_order_id'] = $this->externalOrderId;
        }
        if (isset($this->items)) {
            $data['items'] = $this->items;
        }
        if (isset($this->dueTime)) {
            $data['due_time'] = $this->dueTime instanceof \JsonSerializable ? $this->dueTime->jsonSerialize() : $this->dueTime;
        }
        if (isset($this->routePoints)) {
            $data['route_points'] = array_map(function($item) {
                return $item instanceof \JsonSerializable ? $item->jsonSerialize() : $item;
            }, $this->routePoints);
        }
        if (isset($this->state)) {
            $data['state'] = $this->state;
        }
        if (isset($this->courierInfo)) {
            $data['courier_info'] = $this->courierInfo;
        }
        if (isset($this->estimation)) {
            $data['estimation'] = $this->estimation;
        }
        if (isset($this->needReturn)) {
            $data['need_return'] = $this->needReturn;
        }
        if (isset($this->comment)) {
            $data['comment'] = $this->comment;
        }
        if (isset($this->meta)) {
            $data['meta'] = $this->meta;
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
