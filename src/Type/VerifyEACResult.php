<?php
/**
 * VerifyEACResult - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * VerifyEACResult - Immutable DTO
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class VerifyEACResult implements \JsonSerializable
{
    /**
     * @var VerifyEACStatusEnum
     */
    private VerifyEACStatusEnum $verificationResult;

    /**
     * @var int
     */
    private int $attemptsLeft;

    /**
     * Constructor
     */
    public function __construct(
        VerifyEACStatusEnum $verificationResult,
        int $attemptsLeft
    ) {
        $this->verificationResult = $verificationResult;
        $this->attemptsLeft = $attemptsLeft;
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
            VerifyEACStatusEnum::fromArray($data['verificationResult']),
            $data['attemptsLeft'] ?? 0
        );
    }

    /**
     * Gets verificationResult
     *
     * @return VerifyEACStatusEnum
     */
    public function getVerificationResult(): VerifyEACStatusEnum
    {
        return $this->verificationResult;
    }

    /**
     * Gets attemptsLeft
     *
     * @return int
     */
    public function getAttemptsLeft(): int
    {
        return $this->attemptsLeft;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'verificationResult' => $this->verificationResult,
            'attemptsLeft' => $this->attemptsLeft,
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
