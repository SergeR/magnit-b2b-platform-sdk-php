<?php
/**
 * PartnerConfig - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

declare(strict_types=1);

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * PartnerConfig - Конфигурация партнера
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class PartnerConfig implements \JsonSerializable
{
    private string $expectedCourierArrival;
    private string $maxPerformerSearchTime;
    private string $sla;
    private string $maxOrderAcceptTime;
    private int $maxOrderWeight;
    private int $maxDeliveryDistance;
    private string $deliveryProvider;
    /** @var PartnerConfigPickupPointArrivalInterval[] */
    private array $deferredPickupPointArrivalIntervals;

    /**
     * Constructor
     *
     * @param string $expectedCourierArrival Ожидаемое время прибытия курьера
     * @param string $maxPerformerSearchTime Максимальное время поиска исполнителя
     * @param string $sla SLA
     * @param string $maxOrderAcceptTime Максимальное время принятия заказа
     * @param int $maxOrderWeight Максимальный вес заказа
     * @param int $maxDeliveryDistance Максимальная дистанция доставки
     * @param string $deliveryProvider Провайдер доставки (delivery_service, proxy_dispatch)
     * @param PartnerConfigPickupPointArrivalInterval[] $deferredPickupPointArrivalIntervals Интервалы прибытия в ПВЗ
     */
    public function __construct(
        string $expectedCourierArrival,
        string $maxPerformerSearchTime,
        string $sla,
        string $maxOrderAcceptTime,
        int $maxOrderWeight,
        int $maxDeliveryDistance,
        string $deliveryProvider,
        array $deferredPickupPointArrivalIntervals
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

    /**
     * Создать из массива
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        $intervals = [];
        if (isset($data['deferred_pickup_point_arrival_intervals']) && is_array($data['deferred_pickup_point_arrival_intervals'])) {
            foreach ($data['deferred_pickup_point_arrival_intervals'] as $item) {
                $intervals[] = PartnerConfigPickupPointArrivalInterval::fromArray($item);
            }
        }

        return new self(
            $data['expected_courier_arrival'] ?? '',
            $data['max_performer_search_time'] ?? '',
            $data['sla'] ?? '',
            $data['max_order_accept_time'] ?? '',
            $data['max_order_weight'] ?? 0,
            $data['max_delivery_distance'] ?? 0,
            $data['delivery_provider'] ?? '',
            $intervals
        );
    }

    /**
     * Gets expectedCourierArrival
     *
     * @return string
     */
    public function getExpectedCourierArrival(): string
    {
        return $this->expectedCourierArrival;
    }

    /**
     * Gets maxPerformerSearchTime
     *
     * @return string
     */
    public function getMaxPerformerSearchTime(): string
    {
        return $this->maxPerformerSearchTime;
    }

    /**
     * Gets sla
     *
     * @return string
     */
    public function getSla(): string
    {
        return $this->sla;
    }

    /**
     * Gets maxOrderAcceptTime
     *
     * @return string
     */
    public function getMaxOrderAcceptTime(): string
    {
        return $this->maxOrderAcceptTime;
    }

    /**
     * Gets maxOrderWeight
     *
     * @return int
     */
    public function getMaxOrderWeight(): int
    {
        return $this->maxOrderWeight;
    }

    /**
     * Gets maxDeliveryDistance
     *
     * @return int
     */
    public function getMaxDeliveryDistance(): int
    {
        return $this->maxDeliveryDistance;
    }

    /**
     * Gets deliveryProvider
     *
     * @return string
     */
    public function getDeliveryProvider(): string
    {
        return $this->deliveryProvider;
    }

    /**
     * Gets deferredPickupPointArrivalIntervals
     *
     * @return PartnerConfigPickupPointArrivalInterval[]
     */
    public function getDeferredPickupPointArrivalIntervals(): array
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
        return [
            'expected_courier_arrival' => $this->expectedCourierArrival,
            'max_performer_search_time' => $this->maxPerformerSearchTime,
            'sla' => $this->sla,
            'max_order_accept_time' => $this->maxOrderAcceptTime,
            'max_order_weight' => $this->maxOrderWeight,
            'max_delivery_distance' => $this->maxDeliveryDistance,
            'delivery_provider' => $this->deliveryProvider,
            'deferred_pickup_point_arrival_intervals' => array_map(
                fn($item) => $item->toArray(),
                $this->deferredPickupPointArrivalIntervals
            ),
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
