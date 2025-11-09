<?php
/**
 * DeliveryOrderStatus
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 * @author   OpenAPI Generator team */

declare(strict_types=1);

namespace SergeR\MagintB2BPlatformSDK\Type;
use \SergeR\MagintB2BPlatformSDK\ObjectSerializer;

/**
 * DeliveryOrderStatus Class Doc Comment
 *
 * @category Class
 * @description Статус заказа на доставку
 * @package  SergeR\MagintB2BPlatformSDK
 */
class DeliveryOrderStatus
{
    /**
     * Possible values of this enum
     */
    public const _NEW = 'NEW';

    public const CREATED = 'CREATED';

    public const DELIVERING_STARTED = 'DELIVERING_STARTED';

    public const ACCEPTED_AT_POINT = 'ACCEPTED_AT_POINT';

    public const IN_COURIER_DELIVERY = 'IN_COURIER_DELIVERY';

    public const ISSUED = 'ISSUED';

    public const DESTROYED = 'DESTROYED';

    public const ACCEPTED_AT_WAREHOUSE = 'ACCEPTED_AT_WAREHOUSE';

    public const REMOVED = 'REMOVED';

    public const WAITING_RETURN = 'WAITING_RETURN';

    public const RETURN_INITIATED = 'RETURN_INITIATED';

    public const RETURN_SEND_TO_WAREHOUSE = 'RETURN_SEND_TO_WAREHOUSE';

    public const POSSIBLY_DEFECTED = 'POSSIBLY_DEFECTED';

    public const DEFECTED = 'DEFECTED';

    public const RETURN_ACCEPTED_AT_WAREHOUSE = 'RETURN_ACCEPTED_AT_WAREHOUSE';

    public const RETURNED_TO_PROVIDER = 'RETURNED_TO_PROVIDER';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues(): array
    {
        return [
            self::_NEW,
            self::CREATED,
            self::DELIVERING_STARTED,
            self::ACCEPTED_AT_POINT,
            self::IN_COURIER_DELIVERY,
            self::ISSUED,
            self::DESTROYED,
            self::ACCEPTED_AT_WAREHOUSE,
            self::REMOVED,
            self::WAITING_RETURN,
            self::RETURN_INITIATED,
            self::RETURN_SEND_TO_WAREHOUSE,
            self::POSSIBLY_DEFECTED,
            self::DEFECTED,
            self::RETURN_ACCEPTED_AT_WAREHOUSE,
            self::RETURNED_TO_PROVIDER
        ];
    }
}
