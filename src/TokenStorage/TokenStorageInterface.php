<?php
/**
 * TokenStorageInterface
 * PHP version 7.4
 *
 * @category Interface
 * @package  SergeR\MagintB2BPlatformSDK\TokenStorage
 */

declare(strict_types=1);

namespace SergeR\MagintB2BPlatformSDK\TokenStorage;

/**
 * Interface for storing and retrieving JWT tokens
 *
 * @category Interface
 * @package  SergeR\MagintB2BPlatformSDK\TokenStorage
 */
interface TokenStorageInterface
{
    /**
     * Get the current token
     *
     * @return string|null
     */
    public function getToken(): ?string;

    /**
     * Save token with expiration time
     *
     * @param string $token Token value
     * @param int $expiresIn Token lifetime in seconds
     * @return void
     */
    public function saveToken(string $token, int $expiresIn): void;

    /**
     * Check if token is expired
     *
     * @return bool
     */
    public function isExpired(): bool;

    /**
     * Clear stored token
     *
     * @return void
     */
    public function clear(): void;
}
