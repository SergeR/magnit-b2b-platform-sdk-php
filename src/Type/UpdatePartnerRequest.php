<?php
/**
 * UpdatePartnerRequest - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

declare(strict_types=1);

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * UpdatePartnerRequest - Запрос на обновление партнера
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class UpdatePartnerRequest implements \JsonSerializable
{
    private string $name;
    private string $email;
    private string $parent;
    private array $config;

    /**
     * Constructor
     *
     * @param string $name Название партнера
     * @param string $email Email партнера
     * @param string $parent Родительский партнер
     * @param array $config Конфигурация
     */
    public function __construct(
        string $name,
        string $email,
        string $parent,
        array $config
    ) {
        $this->name = $name;
        $this->email = $email;
        $this->parent = $parent;
        $this->config = $config;
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
            $data['name'] ?? '',
            $data['email'] ?? '',
            $data['parent'] ?? '',
            $data['config'] ?? []
        );
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
     * Gets email
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Gets parent
     *
     * @return string
     */
    public function getParent(): string
    {
        return $this->parent;
    }

    /**
     * Gets config
     *
     * @return array
     */
    public function getConfig(): array
    {
        return $this->config;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'parent' => $this->parent,
            'config' => $this->config,
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
