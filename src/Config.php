<?php
/**
 * Config - Упрощенная конфигурация
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK;

/**
 * Config - Конфигурация SDK
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class Config
{
    public const MODE_PRODUCTION = 'production';
    public const MODE_TEST = 'test';

    private string $host;
    private string $clientId;
    private string $clientSecret;
    private string $scope;
    private string $accessToken = '';
    private string $userAgent = 'Magnit-B2B-SDK/1.0.0/PHP';
    private ?\Psr\Log\LoggerInterface $logger = null;

    /**
     * Constructor
     *
     * @param string $mode Режим работы: Config::MODE_PRODUCTION или Config::MODE_TEST
     * @param string $clientId Client ID
     * @param string $clientSecret Client Secret
     * @param string $scope Scope (по умолчанию 'mm:b2b:all')
     */
    public function __construct(
        string $mode,
        string $clientId,
        string $clientSecret,
        string $scope = 'mm:b2b:all'
    ) {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->scope = $scope;

        // Устанавливаем host в зависимости от режима
        if ($mode === self::MODE_PRODUCTION) {
            $this->host = 'https://b2b-api.magnit.ru/api';
        } elseif ($mode === self::MODE_TEST) {
            $this->host = 'https://b2b-api-gateway.uat.ya.magnit.ru/api';
        } else {
            throw new \InvalidArgumentException(
                "Invalid mode: {$mode}. Use Config::MODE_PRODUCTION or Config::MODE_TEST"
            );
        }
    }

    /**
     * Создать конфигурацию для production
     *
     * @param string $clientId Client ID
     * @param string $clientSecret Client Secret
     * @param string $scope Scope (по умолчанию 'mm:b2b:all')
     * @return self
     */
    public static function forProduction(
        string $clientId,
        string $clientSecret,
        string $scope = 'mm:b2b:all'
    ): self {
        return new self(self::MODE_PRODUCTION, $clientId, $clientSecret, $scope);
    }

    /**
     * Создать конфигурацию для testing
     *
     * @param string $clientId Client ID
     * @param string $clientSecret Client Secret
     * @param string $scope Scope (по умолчанию 'mm:b2b:all')
     * @return self
     */
    public static function forTesting(
        string $clientId,
        string $clientSecret,
        string $scope = 'mm:b2b:all'
    ): self {
        return new self(self::MODE_TEST, $clientId, $clientSecret, $scope);
    }

    /**
     * Gets host
     *
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * Gets client ID
     *
     * @return string
     */
    public function getClientId(): string
    {
        return $this->clientId;
    }

    /**
     * Gets client secret
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
     * Gets user agent
     *
     * @return string
     */
    public function getUserAgent(): string
    {
        return $this->userAgent;
    }

    /**
     * Sets user agent
     *
     * @param string $userAgent
     * @return self
     */
    public function setUserAgent(string $userAgent): self
    {
        $this->userAgent = $userAgent;
        return $this;
    }

    /**
     * Gets logger
     *
     * @return \Psr\Log\LoggerInterface|null
     */
    public function getLogger(): ?\Psr\Log\LoggerInterface
    {
        return $this->logger;
    }

    /**
     * Sets PSR-3 logger
     *
     * @param \Psr\Log\LoggerInterface $logger
     * @return self
     */
    public function setLogger(\Psr\Log\LoggerInterface $logger): self
    {
        $this->logger = $logger;
        return $this;
    }
}
