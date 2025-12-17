<?php
/**
 * MarketplaceShipmentsConfirmRequest - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * MarketplaceShipmentsConfirmRequest - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class MarketplaceShipmentsConfirmRequest implements \JsonSerializable
{
    /**
     * @var \DateTime
     */
    private \DateTime $deliveryDate;

    /**
     * Constructor
     */
    public function __construct(
        \DateTime $deliveryDate
    ) {
        $this->deliveryDate = $deliveryDate;
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
            \DateTime::createFromFormat('Y-m-d\TH:i:s', $data['deliveryDate']) ?: new \DateTime($data['deliveryDate'])
        );
    }

    /**
     * Gets deliveryDate
     *
     * @return \DateTime
     */
    public function getDeliveryDate(): \DateTime
    {
        return $this->deliveryDate;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'deliveryDate' => $this->deliveryDate instanceof \JsonSerializable ? $this->deliveryDate->jsonSerialize() : $this->deliveryDate,
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
