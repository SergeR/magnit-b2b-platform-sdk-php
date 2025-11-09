<?php
/**
 * AuthRequest - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

declare(strict_types=1);

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * AuthRequest - Запрос на авторизацию
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class AuthRequest
{
    private string $clientId;
    private string $clientSecret;
    private string $scope;
    private string $grantType;

    /**
     * Constructor
     *
     * @param string $clientId Client ID
     * @param string $clientSecret Client Secret
     * @param string $scope Scope (по умолчанию 'mm:b2b:all')
     * @param string $grantType Grant type (по умолчанию 'client_credentials')
     */
    public function __construct(
        string $clientId,
        string $clientSecret,
        string $scope = 'mm:b2b:all',
        string $grantType = 'client_credentials'
    ) {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->scope = $scope;
        $this->grantType = $grantType;
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
            $data['client_id'],
            $data['client_secret'],
            $data['scope'],
            $data['grant_type']
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
        return self::fromArray($data ?? []);
    }

    /**
     * Gets clientId
     *
     * @return string
     */
    public function getClientId(): string
    {
        return $this->clientId;
    }

    /**
     * Gets clientSecret
     *
     * @return string
     */
    public function getClientSecret(): string
    {
        return $this->clientSecret;
    }

    /**
     * Gets scope
     *
     * @return string
     */
    public function getScope(): string
    {
        return $this->scope;
    }

    /**
     * Gets grantType
     *
     * @return string
     */
    public function getGrantType(): string
    {
        return $this->grantType;
    }

    /**
     * Преобразовать в массив (для http_build_query)
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'scope' => $this->scope,
            'grant_type' => $this->grantType,
        ];
    }
}
