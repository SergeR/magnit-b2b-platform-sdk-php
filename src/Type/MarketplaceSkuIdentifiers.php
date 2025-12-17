<?php
/**
 * MarketplaceSkuIdentifiers - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * MarketplaceSkuIdentifiers - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class MarketplaceSkuIdentifiers implements \JsonSerializable
{
    /**
     * @var string
     */
    private string $cis;

    /**
     * @var string
     */
    private string $uin;

    /**
     * @var string
     */
    private string $rnpt;

    /**
     * @var string
     */
    private string $gtd;

    /**
     * Constructor
     */
    public function __construct(
        string $cis,
        string $uin,
        string $rnpt,
        string $gtd
    ) {
        $this->cis = $cis;
        $this->uin = $uin;
        $this->rnpt = $rnpt;
        $this->gtd = $gtd;
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
            $data['cis'],
            $data['uin'],
            $data['rnpt'],
            $data['gtd']
        );
    }

    /**
     * Gets cis
     *
     * @return string
     */
    public function getCis(): string
    {
        return $this->cis;
    }

    /**
     * Gets uin
     *
     * @return string
     */
    public function getUin(): string
    {
        return $this->uin;
    }

    /**
     * Gets rnpt
     *
     * @return string
     */
    public function getRnpt(): string
    {
        return $this->rnpt;
    }

    /**
     * Gets gtd
     *
     * @return string
     */
    public function getGtd(): string
    {
        return $this->gtd;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'cis' => $this->cis,
            'uin' => $this->uin,
            'rnpt' => $this->rnpt,
            'gtd' => $this->gtd,
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
