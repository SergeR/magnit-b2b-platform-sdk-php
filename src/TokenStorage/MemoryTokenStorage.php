<?php
/**
 * MemoryTokenStorage
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK\TokenStorage
 */

namespace SergeR\MagintB2BPlatformSDK\TokenStorage;

/**
 * In-memory token storage implementation (for testing or single request)
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK\TokenStorage
 */
class MemoryTokenStorage implements TokenStorageInterface
{
    /**
     * @var string|null
     */
    private $token;

    /**
     * @var int|null
     */
    private $expiresAt;

    /**
     * Get the current token
     *
     * @return string|null
     */
    public function getToken(): ?string
    {
        return $this->token;
    }

    /**
     * Save token with expiration time
     *
     * @param string $token Token value
     * @param int $expiresIn Token lifetime in seconds
     * @return void
     */
    public function saveToken(string $token, int $expiresIn): void
    {
        $this->token = $token;
        $this->expiresAt = time() + $expiresIn - 60; // Обновляем за минуту до истечения
    }

    /**
     * Check if token is expired
     *
     * @return bool
     */
    public function isExpired(): bool
    {
        if ($this->token === null || $this->expiresAt === null) {
            return true;
        }

        return time() >= $this->expiresAt;
    }

    /**
     * Clear stored token
     *
     * @return void
     */
    public function clear(): void
    {
        $this->token = null;
        $this->expiresAt = null;
    }
}
