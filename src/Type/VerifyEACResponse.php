<?php
/**
 * VerifyEACResponse - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * VerifyEACResponse - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class VerifyEACResponse implements \JsonSerializable
{
    /**
     * @var VerifyEACResult
     */
    private VerifyEACResult $result;

    /**
     * Constructor
     */
    public function __construct(
        VerifyEACResult $result
    ) {
        $this->result = $result;
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
            VerifyEACResult::fromArray($data['result'])
        );
    }

    /**
     * Gets result
     *
     * @return VerifyEACResult
     */
    public function getResult(): VerifyEACResult
    {
        return $this->result;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'result' => $this->result,
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
