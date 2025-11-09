<?php
/**
 * FileTokenStorage
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK\TokenStorage
 */

namespace SergeR\MagintB2BPlatformSDK\TokenStorage;

/**
 * File-based token storage implementation
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK\TokenStorage
 */
class FileTokenStorage implements TokenStorageInterface
{
    /**
     * @var string
     */
    private $filePath;

    /**
     * Constructor
     *
     * @param string $filePath Path to token file
     */
    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    /**
     * Get the current token
     *
     * @return string|null
     */
    public function getToken(): ?string
    {
        if (!file_exists($this->filePath)) {
            return null;
        }

        $data = json_decode(file_get_contents($this->filePath), true);
        
        if (!$data || !isset($data['token'])) {
            return null;
        }

        return $data['token'];
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
        $data = [
            'token' => $token,
            'expires_at' => time() + $expiresIn - 60 // Обновляем за минуту до истечения
        ];

        $dir = dirname($this->filePath);
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        file_put_contents($this->filePath, json_encode($data));
    }

    /**
     * Check if token is expired
     *
     * @return bool
     */
    public function isExpired(): bool
    {
        if (!file_exists($this->filePath)) {
            return true;
        }

        $data = json_decode(file_get_contents($this->filePath), true);
        
        if (!$data || !isset($data['expires_at'])) {
            return true;
        }

        return time() >= $data['expires_at'];
    }

    /**
     * Clear stored token
     *
     * @return void
     */
    public function clear(): void
    {
        if (file_exists($this->filePath)) {
            unlink($this->filePath);
        }
    }
}
