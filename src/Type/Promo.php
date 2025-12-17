<?php
/**
 * Promo - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * Promo - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class Promo implements \JsonSerializable
{
    /**
     * @var PromoTypeEnum
     */
    private PromoTypeEnum $type;

    /**
     * @var string
     */
    private string $name;

    /**
     * @var string
     */
    private string $value;

    /**
     * Constructor
     */
    public function __construct(
        PromoTypeEnum $type,
        string $name,
        string $value
    ) {
        $this->type = $type;
        $this->name = $name;
        $this->value = $value;
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
            PromoTypeEnum::fromArray($data['type']),
            $data['name'],
            $data['value']
        );
    }

    /**
     * Gets type
     *
     * @return PromoTypeEnum
     */
    public function getType(): PromoTypeEnum
    {
        return $this->type;
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
     * Gets value
     *
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'type' => $this->type,
            'name' => $this->name,
            'value' => $this->value,
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
