<?php
/**
 * Partner - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * Partner - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class Partner implements \JsonSerializable
{
    /**
     * @var string
     */
    private $partnerId;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $parent;

    /**
     * @var string
     */
    private $displayName;

    /**
     * @var array
     */
    private $config;

            /**
     * Constructor
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
        if (isset($data['name'])) {
            $this->name = $data['name'];
        }
        if (isset($data['email'])) {
            $this->email = $data['email'];
        }
        if (isset($data['parent'])) {
            $this->parent = $data['parent'];
        }
        if (isset($data['display_name'])) {
            $this->displayName = $data['display_name'];
        }
        if (isset($data['config'])) {
            $this->config = $data['config'];
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
            $data['partner_id'],
            $data['name'],
            $data['email'],
            $data['parent'],
            $data['display_name'],
            $data['config']
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
     * Gets partnerId
     *
     * @return string
     */
    public function getPartnerId()
    {
        return $this->partnerId;
    }

    /**
     * Gets name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Gets email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Gets parent
     *
     * @return string
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Gets displayName
     *
     * @return string
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * Gets config
     *
     * @return array
     */
    public function getConfig()
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
        $data = [];
        
        if (isset($this->partnerId)) {
            $data['partner_id'] = $this->partnerId;
        }
        if (isset($this->name)) {
            $data['name'] = $this->name;
        }
        if (isset($this->email)) {
            $data['email'] = $this->email;
        }
        if (isset($this->parent)) {
            $data['parent'] = $this->parent;
        }
        if (isset($this->displayName)) {
            $data['display_name'] = $this->displayName;
        }
        if (isset($this->config)) {
            $data['config'] = $this->config;
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
