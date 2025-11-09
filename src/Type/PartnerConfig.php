<?php
/**
 * PartnerConfig - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * PartnerConfig - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class PartnerConfig implements \JsonSerializable
{
    /**
     * @var string
     */
    private $expectedCourierArrival;

    /**
     * @var string
     */
    private $maxPerformerSearchTime;

    /**
     * @var string
     */
    private $sla;

    /**
     * @var string
     */
    private $maxOrderAcceptTime;

    /**
     * @var int
     */
    private $maxOrderWeight;

    /**
     * @var int
     */
    private $maxDeliveryDistance;

    /**
     * @var PartnerConfigDeliveryProvider
     */
    private $deliveryProvider;

    /**
     * @var PartnerConfigPickupPointArrivalInterval[]
     */
    private $deferredPickupPointArrivalIntervals;

            /**
     * Constructor
     */
    public function __construct(
        string $expectedCourierArrival,
        string $maxPerformerSearchTime,
        string $sla,
        string $maxOrderAcceptTime,
        int $maxOrderWeight,
        int $maxDeliveryDistance,
        PartnerConfigDeliveryProvider $deliveryProvider,
        PartnerConfigPickupPointArrivalInterval[] $deferredPickupPointArrivalIntervals
    ) {
        $this->expectedCourierArrival = $expectedCourierArrival;
        $this->maxPerformerSearchTime = $maxPerformerSearchTime;
        $this->sla = $sla;
        $this->maxOrderAcceptTime = $maxOrderAcceptTime;
        $this->maxOrderWeight = $maxOrderWeight;
        $this->maxDeliveryDistance = $maxDeliveryDistance;
        $this->deliveryProvider = $deliveryProvider;
        $this->deferredPickupPointArrivalIntervals = $deferredPickupPointArrivalIntervals;
    }
        if (isset($data['max_performer_search_time'])) {
            $this->maxPerformerSearchTime = $data['max_performer_search_time'];
        }
        if (isset($data['sla'])) {
            $this->sla = $data['sla'];
        }
        if (isset($data['max_order_accept_time'])) {
            $this->maxOrderAcceptTime = $data['max_order_accept_time'];
        }
        if (isset($data['max_order_weight'])) {
            $this->maxOrderWeight = $data['max_order_weight'];
        }
        if (isset($data['max_delivery_distance'])) {
            $this->maxDeliveryDistance = $data['max_delivery_distance'];
        }
        if (isset($data['delivery_provider'])) {
            $this->deliveryProvider = $data['delivery_provider'];
        }
        if (isset($data['deferred_pickup_point_arrival_intervals'])) {
            $this->deferredPickupPointArrivalIntervals = $data['deferred_pickup_point_arrival_intervals'];
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
            $data['expected_courier_arrival'],
            $data['max_performer_search_time'],
            $data['sla'],
            $data['max_order_accept_time'],
            $data['max_order_weight'],
            $data['max_delivery_distance'],
            PartnerConfigDeliveryProvider::fromArray($data['delivery_provider']),
            isset($data['deferred_pickup_point_arrival_intervals']) ? array_map(fn($item) => PartnerConfigPickupPointArrivalInterval::fromArray($item), $data['deferred_pickup_point_arrival_intervals']) : []
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
     * Gets expectedCourierArrival
     *
     * @return string
     */
    public function getExpectedCourierArrival()
    {
        return $this->expectedCourierArrival;
    }

    /**
     * Gets maxPerformerSearchTime
     *
     * @return string
     */
    public function getMaxPerformerSearchTime()
    {
        return $this->maxPerformerSearchTime;
    }

    /**
     * Gets sla
     *
     * @return string
     */
    public function getSla()
    {
        return $this->sla;
    }

    /**
     * Gets maxOrderAcceptTime
     *
     * @return string
     */
    public function getMaxOrderAcceptTime()
    {
        return $this->maxOrderAcceptTime;
    }

    /**
     * Gets maxOrderWeight
     *
     * @return int
     */
    public function getMaxOrderWeight()
    {
        return $this->maxOrderWeight;
    }

    /**
     * Gets maxDeliveryDistance
     *
     * @return int
     */
    public function getMaxDeliveryDistance()
    {
        return $this->maxDeliveryDistance;
    }

    /**
     * Gets deliveryProvider
     *
     * @return PartnerConfigDeliveryProvider
     */
    public function getDeliveryProvider()
    {
        return $this->deliveryProvider;
    }

    /**
     * Gets deferredPickupPointArrivalIntervals
     *
     * @return PartnerConfigPickupPointArrivalInterval[]
     */
    public function getDeferredPickupPointArrivalIntervals()
    {
        return $this->deferredPickupPointArrivalIntervals;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = [];
        
        if (isset($this->expectedCourierArrival)) {
            $data['expected_courier_arrival'] = $this->expectedCourierArrival;
        }
        if (isset($this->maxPerformerSearchTime)) {
            $data['max_performer_search_time'] = $this->maxPerformerSearchTime;
        }
        if (isset($this->sla)) {
            $data['sla'] = $this->sla;
        }
        if (isset($this->maxOrderAcceptTime)) {
            $data['max_order_accept_time'] = $this->maxOrderAcceptTime;
        }
        if (isset($this->maxOrderWeight)) {
            $data['max_order_weight'] = $this->maxOrderWeight;
        }
        if (isset($this->maxDeliveryDistance)) {
            $data['max_delivery_distance'] = $this->maxDeliveryDistance;
        }
        if (isset($this->deliveryProvider)) {
            $data['delivery_provider'] = $this->deliveryProvider;
        }
        if (isset($this->deferredPickupPointArrivalIntervals)) {
            $data['deferred_pickup_point_arrival_intervals'] = array_map(function($item) {
                return $item instanceof \JsonSerializable ? $item->jsonSerialize() : $item;
            }, $this->deferredPickupPointArrivalIntervals);
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
