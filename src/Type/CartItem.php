<?php
/**
 * CartItem - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

declare(strict_types=1);

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * CartItem - Товар в корзине
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class CartItem implements \JsonSerializable
{
    private string $goodId;
    private string $name;
    private int $qnty;
    private ProductPrice $price;
    private string $unit;
    /** @var Marking[] */
    private array $marking;

    /**
     * Constructor
     *
     * @param string $goodId ID товара
     * @param string $name Название
     * @param int $qnty Количество
     * @param ProductPrice $price Цена
     * @param string $unit Единица измерения (PIECE, KILOGRAM, и т.д.)
     * @param Marking[] $marking Маркировка
     */
    public function __construct(
        string $goodId,
        string $name,
        int $qnty,
        ProductPrice $price,
        string $unit,
        array $marking
    ) {
        $this->goodId = $goodId;
        $this->name = $name;
        $this->qnty = $qnty;
        $this->price = $price;
        $this->unit = $unit;
        $this->marking = $marking;
    }

    /**
     * Создать из массива
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        $marking = [];
        if (isset($data['marking']) && is_array($data['marking'])) {
            foreach ($data['marking'] as $item) {
                $marking[] = Marking::fromArray($item);
            }
        }

        return new self(
            $data['good_id'],
            $data['name'],
            $data['qnty'],
            ProductPrice::fromArray($data['price']),
            $data['unit'],
            $marking
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
     * Gets marking
     *
     * @return Marking[]
     */
    public function getMarking(): array
    {
        return $this->marking;
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
            'marking' => array_map(fn($item) => $item->toArray(), $this->marking),
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
