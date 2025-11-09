<?php
/**
 * DeliveryOrderStatusesRequest - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

declare(strict_types=1);

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * DeliveryOrderStatusesRequest - Запрос статусов нескольких заказов
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class DeliveryOrderStatusesRequest implements \JsonSerializable
{
    /** @var string[] */
    private array $trackingNumbers;

    /**
     * Constructor
     *
     * @param string[] $trackingNumbers Список трек-номеров заказов
     */
    public function __construct(array $trackingNumbers)
    {
        $this->trackingNumbers = $trackingNumbers;
    }

    /**
     * Создать из массива
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self($data['tracking_numbers']);
    }

    /**
     * Gets trackingNumbers
     *
     * @return string[]
     */
    public function getTrackingNumbers(): array
    {
        return $this->trackingNumbers;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'tracking_numbers' => $this->trackingNumbers,
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
