<?php
/**
 * PartnerConfigPickupPointArrivalInterval - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * PartnerConfigPickupPointArrivalInterval - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class PartnerConfigPickupPointArrivalInterval implements \JsonSerializable
{
    /**
     * @var string
     */
    private $lowerBorder;

    /**
     * @var string
     */
    private $upperBorder;

            /**
     * Constructor
     */
    public function __construct(
        string $lowerBorder,
        string $upperBorder
    ) {
        $this->lowerBorder = $lowerBorder;
        $this->upperBorder = $upperBorder;
    }
        if (isset($data['upper_border'])) {
            $this->upperBorder = $data['upper_border'];
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
            $data['lower_border'],
            $data['upper_border']
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
     * Gets lowerBorder
     *
     * @return string
     */
    public function getLowerBorder()
    {
        return $this->lowerBorder;
    }

    /**
     * Gets upperBorder
     *
     * @return string
     */
    public function getUpperBorder()
    {
        return $this->upperBorder;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = [];
        
        if (isset($this->lowerBorder)) {
            $data['lower_border'] = $this->lowerBorder;
        }
        if (isset($this->upperBorder)) {
            $data['upper_border'] = $this->upperBorder;
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
