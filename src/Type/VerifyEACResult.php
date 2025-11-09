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
    private $verificationResult;

    /**
     * @var int
     */
    private $attemptsLeft;

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
        if (isset($data['attemptsLeft'])) {
            $this->attemptsLeft = $data['attemptsLeft'];
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
            VerifyEACStatusEnum::fromArray($data['verification_result']),
            $data['attempts_left']
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
     * Gets verificationResult
     *
     * @return VerifyEACStatusEnum
     */
    public function getVerificationResult()
    {
        return $this->verificationResult;
    }

    /**
     * Gets attemptsLeft
     *
     * @return int
     */
    public function getAttemptsLeft()
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
        $data = [];
        
        if (isset($this->verificationResult)) {
            $data['verificationResult'] = $this->verificationResult;
        }
        if (isset($this->attemptsLeft)) {
            $data['attemptsLeft'] = $this->attemptsLeft;
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
