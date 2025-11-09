<?php
/**
 * Partner - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

declare(strict_types=1);

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * Partner - Партнер
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class Partner implements \JsonSerializable
{
    private string $partnerId;
    private string $name;
    private string $email;
    private string $parent;
    private string $displayName;
    private array $config;

    /**
     * Constructor
     *
     * @param string $partnerId ID партнера
     * @param string $name Название
     * @param string $email Email
     * @param string $parent Родительский партнер
     * @param string $displayName Отображаемое имя
     * @param array $config Конфигурация
     */
    public function __construct(
        string $partnerId,
        string $name,
        string $email,
        string $parent,
        string $displayName,
        array $config
    ) {
        $this->partnerId = $partnerId;
        $this->name = $name;
        $this->email = $email;
        $this->parent = $parent;
        $this->displayName = $displayName;
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
            $data['partner_id'] ?? '',
            $data['name'] ?? '',
            $data['email'] ?? '',
            $data['parent'] ?? '',
            $data['display_name'] ?? '',
            $data['config'] ?? []
        );
    }

    /**
     * Gets partnerId
     *
     * @return string
     */
    public function getPartnerId(): string
    {
        return $this->partnerId;
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
     * Gets displayName
     *
     * @return string
     */
    public function getDisplayName(): string
    {
        return $this->displayName;
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
            'partner_id' => $this->partnerId,
            'name' => $this->name,
            'email' => $this->email,
            'parent' => $this->parent,
            'display_name' => $this->displayName,
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
