<?php
/**
 * OauthToken - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * OauthToken - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class OauthToken implements \JsonSerializable
{
    /**
     * @var string
     */
    private string $accessToken;

    /**
     * @var int
     */
    private int $expiresIn;

    /**
     * @var string
     */
    private string $scope;

    /**
     * @var string
     */
    private string $tokenType;

    /**
     * Constructor
     *
     * @param string $accessToken
     * @param int $expiresIn
     * @param string $scope
     * @param string $tokenType
     */
    public function __construct(
        string $accessToken,
        int $expiresIn,
        string $scope,
        string $tokenType
    ) {
        $this->accessToken = $accessToken;
        $this->expiresIn = $expiresIn;
        $this->scope = $scope;
        $this->tokenType = $tokenType;
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
            $data['access_token'],
            $data['expires_in'],
            $data['scope'],
            $data['token_type']
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
     * Gets accessToken
     *
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    /**
     * Gets expiresIn
     *
     * @return int
     */
    public function getExpiresIn(): int
    {
        return $this->expiresIn;
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
     * Gets tokenType
     *
     * @return string
     */
    public function getTokenType(): string
    {
        return $this->tokenType;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'accessToken' => $this->accessToken,
            'expiresIn' => $this->expiresIn,
            'scope' => $this->scope,
            'tokenType' => $this->tokenType,
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
