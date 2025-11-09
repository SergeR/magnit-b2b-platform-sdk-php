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
    private $cis;

    /**
     * @var string
     */
    private $uin;

    /**
     * @var string
     */
    private $rnpt;

    /**
     * @var string
     */
    private $gtd;

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
        if (isset($data['uin'])) {
            $this->uin = $data['uin'];
        }
        if (isset($data['rnpt'])) {
            $this->rnpt = $data['rnpt'];
        }
        if (isset($data['gtd'])) {
            $this->gtd = $data['gtd'];
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
            $data['cis'],
            $data['uin'],
            $data['rnpt'],
            $data['gtd']
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
     * Gets cis
     *
     * @return string
     */
    public function getCis()
    {
        return $this->cis;
    }

    /**
     * Gets uin
     *
     * @return string
     */
    public function getUin()
    {
        return $this->uin;
    }

    /**
     * Gets rnpt
     *
     * @return string
     */
    public function getRnpt()
    {
        return $this->rnpt;
    }

    /**
     * Gets gtd
     *
     * @return string
     */
    public function getGtd()
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
        $data = [];
        
        if (isset($this->cis)) {
            $data['cis'] = $this->cis;
        }
        if (isset($this->uin)) {
            $data['uin'] = $this->uin;
        }
        if (isset($this->rnpt)) {
            $data['rnpt'] = $this->rnpt;
        }
        if (isset($this->gtd)) {
            $data['gtd'] = $this->gtd;
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
