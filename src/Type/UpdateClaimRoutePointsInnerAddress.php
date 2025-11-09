<?php
/**
 * UpdateClaimRoutePointsInnerAddress - Immutable DTO
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

declare(strict_types=1);

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * UpdateClaimRoutePointsInnerAddress - Адрес точки маршрута
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class UpdateClaimRoutePointsInnerAddress implements \JsonSerializable
{
    private string $comment;

    /**
     * Constructor
     *
     * @param string $comment Комментарий к адресу
     */
    public function __construct(string $comment)
    {
        $this->comment = $comment;
    }

    /**
     * Создать из массива
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self($data['comment'] ?? '');
    }

    /**
     * Gets comment
     *
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * Преобразовать в массив
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'comment' => $this->comment,
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
