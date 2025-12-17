<?php
/**
 * StockInfoDetails - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * StockInfoDetails - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class StockInfoDetails implements \JsonSerializable
{
    /**
     * @var int
     */
    private int $reserved;

    /**
     * @var int
     */
    private int $stock;

    /**
     * @var string
     */
    private string $type;

    /**
     * Constructor
     */
    public function __construct(
        int $reserved,
        int $stock,
        string $type
    ) {
        $this->reserved = $reserved;
        $this->stock = $stock;
        $this->type = $type;
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
            $data['reserved'],
            $data['stock'],
            $data['type']
        );
    }

    /**
     * Gets reserved
     *
     * @return int
     */
    public function getReserved(): int
    {
        return $this->reserved;
    }

    /**
     * Gets stock
     *
     * @return int
     */
    public function getStock(): int
    {
        return $this->stock;
    }

    /**
     * Gets type
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'reserved' => $this->reserved,
            'stock' => $this->stock,
            'type' => $this->type,
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
