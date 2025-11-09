<?php
/**
 * EAC - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * EAC - Код маркировки (EAC - Eurasian Conformity)
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class EAC implements \JsonSerializable
{
    private string $code;

    /**
     * Constructor
     *
     * @param string $code Код маркировки EAC
     */
    public function __construct(string $code)
    {
        $this->code = $code;
    }

    /**
     * Создать из массива
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self($data['code']);
    }

    /**
     * Gets code
     *
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'code' => $this->code,
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
