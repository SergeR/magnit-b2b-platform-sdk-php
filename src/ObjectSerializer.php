<?php
/**
 * ObjectSerializer - Упрощенная версия
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK;

/**
 * ObjectSerializer - Упрощенный сериализатор без лишних зависимостей
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class ObjectSerializer
{
    /** @var string */
    private static $dateTimeFormat = \DateTime::ATOM;

    /**
     * Изменить формат даты
     *
     * @param string $format Новый формат даты
     */
    public static function setDateTimeFormat(string $format): void
    {
        self::$dateTimeFormat = $format;
    }

    /**
     * Сериализация данных - упрощенная версия
     *
     * @param mixed $data Данные для сериализации
     * @param string|null $type Тип данных (не используется в упрощенной версии)
     * @param string|null $format Формат данных
     *
     * @return mixed Сериализованные данные
     */
    public static function sanitizeForSerialization($data, $type = null, $format = null)
    {
        if (is_scalar($data) || null === $data) {
            return $data;
        }

        if ($data instanceof \DateTime) {
            return ($format === 'date') ? $data->format('Y-m-d') : $data->format(self::$dateTimeFormat);
        }

        if (is_array($data)) {
            $result = [];
            foreach ($data as $key => $value) {
                $result[$key] = self::sanitizeForSerialization($value);
            }
            return $result;
        }

        if (is_object($data)) {
            // Если объект реализует JsonSerializable - используем его
            if ($data instanceof \JsonSerializable) {
                return $data->jsonSerialize();
            }
            
            // Если есть метод toArray - используем его
            if (method_exists($data, 'toArray')) {
                return $data->toArray();
            }
            
            // Иначе просто конвертируем в массив
            return (array) $data;
        }

        return (string)$data;
    }

    /**
     * Десериализация JSON в объ��кт - упрощенная версия
     *
     * @param mixed $data Данные для десериализации
     * @param string $class Имя класса
     * @param array|null $httpHeaders HTTP заголовки (не используется)
     *
     * @return mixed Десериализованный объект
     */
    public static function deserialize($data, string $class, ?array $httpHeaders = null)
    {
        if (null === $data) {
            return null;
        }

        // Обработка массивов объектов
        if (substr($class, -2) === '[]') {
            $data = is_string($data) ? json_decode($data, true) : $data;

            if (!is_array($data)) {
                throw new \InvalidArgumentException("Invalid array for class '$class'");
            }

            $itemClass = substr($class, 0, -2);
            $result = [];
            foreach ($data as $item) {
                $result[] = self::deserialize($item, $itemClass, null);
            }
            return $result;
        }

        // Примитивные типы
        $primitives = ['string', 'int', 'integer', 'bool', 'boolean', 'float', 'double', 'number', 'array', 'object', 'mixed'];
        if (in_array($class, $primitives, true)) {
            return $data;
        }

        // DateTime
        if ($class === '\DateTime' || $class === 'DateTime') {
            if (empty($data)) {
                return null;
            }
            try {
                return new \DateTime($data);
            } catch (\Exception $e) {
                return null;
            }
        }

        // Десериализация объекта
        $data = is_string($data) ? json_decode($data, true) : $data;
        
        if (!is_array($data)) {
            return $data;
        }

        // Проверяем, существует ли класс
        if (!class_exists($class)) {
            return $data;
        }

        // Создаем экземпляр через конструктор с массивом
        try {
            return new $class($data);
        } catch (\Exception $e) {
            // Если не получилось - возвращаем массив
            return $data;
        }
    }

    /**
     * Преобразовать значение �� строку для URL
     *
     * @param mixed $value Значение
     * @return string
     */
    public static function toPathValue($value): string
    {
        return rawurlencode(self::toString($value));
    }

    /**
     * Преобразовать значение в строку
     *
     * @param mixed $value Значение
     * @return string
     */
    public static function toString($value): string
    {
        if ($value instanceof \DateTime) {
            return $value->format(self::$dateTimeFormat);
        }
        
        if (is_bool($value)) {
            return $value ? 'true' : 'false';
        }
        
        return (string) $value;
    }

    /**
     * Построить query string
     *
     * @param array|object $data Данные
     * @param string $numericPrefix Префикс для числовых индексов
     * @param string|null $argSeparator Разделитель аргументов
     * @param int $encodingType Тип кодирования
     *
     * @return string
     */
    public static function buildQuery(
        $data,
        string $numericPrefix = '',
        ?string $argSeparator = null,
        int $encodingType = \PHP_QUERY_RFC3986
    ): string {
        if (class_exists('\GuzzleHttp\Psr7\Query')) {
            return \GuzzleHttp\Psr7\Query::build($data, $encodingType);
        }
        
        return http_build_query($data, $numericPrefix, $argSeparator ?? '&', $encodingType);
    }

    /**
     * Сериализовать коллекцию в строку
     *
     * @param array $collection Коллекция
     * @param string $style Стиль сериализации
     * @param bool $allowMulti Разрешить мультимерные массивы
     *
     * @return string
     */
    public static function serializeCollection(array $collection, string $style, bool $allowMulti = false): string
    {
        if ($allowMulti && $style === 'multi') {
            return preg_replace('/%5B[0-9]+%5D=/', '=', http_build_query($collection, '', '&'));
        }

        switch ($style) {
            case 'pipeDelimited':
            case 'pipes':
                return implode('|', $collection);

            case 'tsv':
                return implode("\t", $collection);

            case 'spaceDelimited':
            case 'ssv':
                return implode(' ', $collection);

            case 'simple':
            case 'csv':
            default:
                return implode(',', $collection);
        }
    }

    /**
     * Преобразовать значение для query параметра
     *
     * @param mixed $value Значение
     * @param string $paramName Имя параметра
     * @param string $openApiType Тип OpenAPI
     * @param string $style Стиль
     * @param bool $explode Explode опция
     * @param bool $required Обязательный параметр
     *
     * @return array
     */
    public static function toQueryValue(
        $value,
        string $paramName,
        string $openApiType = 'string',
        string $style = 'form',
        bool $explode = true,
        bool $required = true
    ): array {
        if ($value === null || $value === '') {
            return $required ? [$paramName => ''] : [];
        }

        if ($value instanceof \DateTime) {
            return [$paramName => $value->format(self::$dateTimeFormat)];
        }

        if (is_bool($value)) {
            return [$paramName => $value ? 'true' : 'false'];
        }

        if (is_array($value)) {
            if ($explode) {
                return $value;
            }
            return [$paramName => self::serializeCollection($value, $style)];
        }

        return [$paramName => $value];
    }

    /**
     * Преобразовать значение для заголовка
     *
     * @param mixed $value Значение
     * @return string
     */
    public static function toHeaderValue($value): string
    {
        if (method_exists($value, 'toHeaderValue')) {
            return $value->toHeaderValue();
        }

        return self::toString($value);
    }

    /**
     * Преобразовать значение для формы
     *
     * @param mixed $value Значение
     * @return string
     */
    public static function toFormValue($value): string
    {
        if ($value instanceof \SplFileObject) {
            return $value->getRealPath();
        }

        return self::toString($value);
    }

    /**
     * Очистить имя файла от пути
     *
     * @param string $filename Имя файла
     * @return string
     */
    public static function sanitizeFilename(string $filename): string
    {
        if (preg_match("/.*[\/\\\\](.*)$/", $filename, $match)) {
            return $match[1];
        }

        return $filename;
    }

    /**
     * Сократить микросекунды в timestamp до 6 цифр
     *
     * @param string $timestamp Timestamp
     * @return string
     */
    public static function sanitizeTimestamp(string $timestamp): string
    {
        return preg_replace('/(:\d{2}.\d{6})\d*/', '$1', $timestamp);
    }

    /**
     * Преобразовать boolean в формат для query string
     *
     * @param bool $value Значение
     * @return string|int
     */
    public static function convertBoolToQueryStringFormat(bool $value)
    {
        return $value ? 'true' : 'false';
    }
}
