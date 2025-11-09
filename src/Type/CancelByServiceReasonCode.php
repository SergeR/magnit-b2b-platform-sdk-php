<?php
/**
 * CancelByServiceReasonCode
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

declare(strict_types=1);

namespace SergeR\MagintB2BPlatformSDK\Type;

/**
 * CancelByServiceReasonCode Class Doc Comment
 *
 * @category Class
 * @description Код причины отмены сервисом: performer_not_found - не удалось найти курьера за отведенное время. out_of_delivery_zone - заказ за пределами зоны доставки. out_of_working_time - заказ создан в нерабочее время. too_high_delivery_distance - слишком большое расстояние между точкой пикапа и дроп офф. too_heavy_cargo - слишком тяжелый заказ. other - другая причина со свободным описанием.
 * @package  SergeR\MagintB2BPlatformSDK
 */
class CancelByServiceReasonCode
{
    /**
     * Possible values of this enum
     */
    public const PERFORMER_NOT_FOUND = 'performer_not_found';

    public const OUT_OF_DELIVERY_ZONE = 'out_of_delivery_zone';

    public const OUT_OF_WORKING_TIME = 'out_of_working_time';

    public const TOO_HIGH_DELIVERY_DISTANCE = 'too_high_delivery_distance';

    public const TOO_HEAVY_CARGO = 'too_heavy_cargo';

    public const OTHER = 'other';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues(): array
    {
        return [
            self::PERFORMER_NOT_FOUND,
            self::OUT_OF_DELIVERY_ZONE,
            self::OUT_OF_WORKING_TIME,
            self::TOO_HIGH_DELIVERY_DISTANCE,
            self::TOO_HEAVY_CARGO,
            self::OTHER
        ];
    }
}
