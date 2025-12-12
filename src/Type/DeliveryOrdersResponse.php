<?php

/**
 * DeliveryOrdersResponse - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

declare(strict_types=1);

namespace SergeR\MagintB2BPlatformSDK\Type;

class DeliveryOrdersResponse implements \JsonSerializable
{
    /**
     * @readonly
     * @var DeliveryOrder[]
     */
    public array $orders;

    /**
     * @readonly
     * @var Pager
     */
    public Pager $pager;

    /**
     * @param array $orders
     * @param Pager $pager
     */
    public function __construct(array $orders, Pager $pager)
    {
        $this->orders = $orders;
        $this->pager = $pager;
    }

    /**
     * Создать экземпляр из массива
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        $orders = [];
        if (isset($data['orders']) && is_array($data['orders'])) {
            foreach ($data['orders'] as $orderData) {
                $orders[] = DeliveryOrder::fromArray($orderData);
            }
        }

        $pager = isset($data['pager']) ? Pager::fromArray($data['pager']) : new Pager(0, 0, 0, 0);

        return new self($orders, $pager);
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'orders' => array_map(function (DeliveryOrder $order) {
                return $order->toArray();
            }, $this->orders),
            'pager' => $this->pager->toArray(),
        ];
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
