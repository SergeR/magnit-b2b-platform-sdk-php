<?php
/**
 * IssueOrderCreateResponsePayload - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * IssueOrderCreateResponsePayload - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class IssueOrderCreateResponsePayload implements \JsonSerializable
{
    /**
     * @var EAC
     */
    private EAC $eac;

    /**
     * Constructor
     */
    public function __construct(
        EAC $eac
    ) {
        $this->eac = $eac;
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
            EAC::fromArray($data['eac'])
        );
    }

    /**
     * Gets eac
     *
     * @return EAC
     */
    public function getEac(): EAC
    {
        return $this->eac;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'eac' => $this->eac,
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
