<?php
/**
 * CartItemRequest - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

declare(strict_types=1);

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * CartItemRequest - Запрос товара в корзине
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class CartItemRequest implements \JsonSerializable
{
    private string $goodId;
    private string $name;
    private int $qnty;
    private ProductPrice $price;
    private string $unit;

    /**
     * Constructor
     *
     * @param string $goodId ID товара
     * @param string $name Название
     * @param int $qnty Количество
     * @param ProductPrice $price Цена
     * @param string $unit Единица измерения (PIECE, KILOGRAM, и т.д.)
     */
    public function __construct(
        string $goodId,
        string $name,
        int $qnty,
        ProductPrice $price,
        string $unit
    ) {
        $this->goodId = $goodId;
        $this->name = $name;
        $this->qnty = $qnty;
        $this->price = $price;
        $this->unit = $unit;
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
            $data['good_id'],
            $data['name'],
            $data['qnty'],
            ProductPrice::fromArray($data['price']),
            $data['unit']
        );
    }

    /**
     * Gets goodId
     *
     * @return string
     */
    public function getGoodId(): string
    {
        return $this->goodId;
    }

    /**
     * Gets name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Gets qnty
     *
     * @return int
     */
    public function getQnty(): int
    {
        return $this->qnty;
    }

    /**
     * Gets price
     *
     * @return ProductPrice
     */
    public function getPrice(): ProductPrice
    {
        return $this->price;
    }

    /**
     * Gets unit
     *
     * @return string
     */
    public function getUnit(): string
    {
        return $this->unit;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'good_id' => $this->goodId,
            'name' => $this->name,
            'qnty' => $this->qnty,
            'price' => $this->price->toArray(),
            'unit' => $this->unit,
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
