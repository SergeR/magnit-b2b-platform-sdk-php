<?php
/**
 * CancelByPartnerReasonCode
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
 * CancelByPartnerReasonCode Class Doc Comment
 *
 * @category Class
 * @description Код причины отмены партнером: long_wait_courier - долгое ожидание курьера cancelled_by_customer - клиент передумал courier_without_inventory - курьер без сумки customer_not_respond - клиента нет дома long_wait_order - долгое ожидание заказа pickup_point_closed - точка выдачи заказа закрыта
 * @package  SergeR\MagintB2BPlatformSDK
 */
class CancelByPartnerReasonCode
{
    /**
     * Possible values of this enum
     */
    public const LONG_WAIT_COURIER = 'long_wait_courier';

    public const CANCELLED_BY_CUSTOMER = 'cancelled_by_customer';

    public const COURIER_WITHOUT_INVENTORY = 'courier_without_inventory';

    public const CUSTOMER_NOT_RESPOND = 'customer_not_respond';

    public const LONG_WAIT_ORDER = 'long_wait_order';

    public const PICKUP_POINT_CLOSED = 'pickup_point_closed';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::LONG_WAIT_COURIER,
            self::CANCELLED_BY_CUSTOMER,
            self::COURIER_WITHOUT_INVENTORY,
            self::CUSTOMER_NOT_RESPOND,
            self::LONG_WAIT_ORDER,
            self::PICKUP_POINT_CLOSED
        ];
    }
}
