# Magnit B2B Platform SDK

> ⚠️ **Work In Progress (WIP)** - SDK находится в активной разработке. На данный момент реализованы **Orders API**, **Magnit Post API** и **Last Mile API**. Остальные API будут добавлены в будущих версиях.

PHP SDK для интеграции с API платформы Магнит B2B.

## Статус реализации

| API | Статус | Методов | Описание |
|-----|--------|---------|----------|
| Orders API | ✅ Готово | 5 | Создание, получение, отмена заказов |
| Magnit Post API | ✅ Готово | 7 | Доставка через Магнит Пост |
| Last Mile API | ✅ Готово | 11 | Доставка последней мили (заявки, партнеры) |
| Nomenclature API | 🚧 В планах | - | Управление номенклатурой |
| WebHook Events API | 🚧 В планах | - | Обработка вебхуков |
| Другие API | 🚧 В планах | - | - |

## Требования

- PHP 7.4 или выше
- Composer
- Расширения: `ext-json`, `ext-curl`

## Установка

```bash
composer require serger/magnit-b2b-platform-sdk
```

## Быстрый старт

```php
<?php
require_once __DIR__ . '/vendor/autoload.php';

use SergeR\MagintB2BPlatformSDK\MagnitApi;
use SergeR\MagintB2BPlatformSDK\MagnitClient;
use SergeR\MagintB2BPlatformSDK\Config;
use SergeR\MagintB2BPlatformSDK\TokenStorage\MemoryTokenStorage;

// 1. Создаем конфигурацию
$config = new Config(
    Config::MODE_TEST,              // или Config::MODE_PRODUCTION
    'your-client-id',
    'your-client-secret'
);

// 2. Создаем хранилище токенов
$tokenStorage = new MemoryTokenStorage();

// 3. Создаем HTTP клиент
$client = new MagnitClient($config, $tokenStorage);

// 4. Создаем API
$api = new MagnitApi($client);

// 5. Используем!
$order = $api->orders->get('ORDER-123');
echo "Статус заказа: {$order->getStatus()}\n";
```

## Конфигурация

### Базовая конфигурация

```php
$config = new Config(
    Config::MODE_TEST,              // Режим работы
    'your-client-id',               // Client ID
    'your-client-secret',           // Client Secret
    'mm:b2b:all'                    // Scope (по умолчанию)
);
```

**Режимы работы:**
- `Config::MODE_TEST` - тестовая среда
- `Config::MODE_PRODUCTION` - продакшн

### Хранение токенов

SDK автоматически обновляет токены авторизации. Вы можете выбрать способ хранения:

#### В памяти (по умолчанию)

```php
use SergeR\MagintB2BPlatformSDK\TokenStorage\MemoryTokenStorage;

$tokenStorage = new MemoryTokenStorage();
$client = new MagnitClient($config, $tokenStorage);
```

#### В файле

```php
use SergeR\MagintB2BPlatformSDK\TokenStorage\FileTokenStorage;

$tokenStorage = new FileTokenStorage(__DIR__ . '/token.json');
$client = new MagnitClient($config, $tokenStorage);
```

#### Свое хранилище

Реализуйте интерфейс `TokenStorageInterface`:

```php
use SergeR\MagintB2BPlatformSDK\TokenStorage\TokenStorageInterface;

class RedisTokenStorage implements TokenStorageInterface
{
    public function getToken(): ?string { /* ... */ }
    public function saveToken(string $token): void { /* ... */ }
    public function clearToken(): void { /* ... */ }
}

$tokenStorage = new RedisTokenStorage();
$client = new MagnitClient($config, $tokenStorage);
```

### Логирование

SDK поддерживает PSR-3 логирование:

```php
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$logger = new Logger('magnit-api');
$logger->pushHandler(new StreamHandler(__DIR__ . '/api.log', Logger::DEBUG));

$config = new Config(
    Config::MODE_TEST,
    'your-client-id',
    'your-client-secret',
    'mm:b2b:all',
    $logger  // Передаем логгер
);
```

## API

### Orders API

API для работы с заказами.

#### Создать заказ

```php
use SergeR\MagintB2BPlatformSDK\Type\OrderRequest;

$orderRequest = new OrderRequest(/* параметры */);
$response = $api->orders->create($orderRequest);

echo "ID заказа: {$response->getId()}\n";
```

#### Получить заказ

```php
$order = $api->orders->get('ORDER-123');

echo "Статус: {$order->getStatus()}\n";
echo "Сумма: {$order->getTotalPrice()}\n";
```

#### Получить статус заказа

```php
$status = $api->orders->getStatus('ORDER-123');

echo "Код статуса: {$status->getCode()}\n";
echo "Причина: {$status->getReason()}\n";
echo "Обновлен: {$status->getUpdatedAt()}\n";
```

#### Изменить статус заказа

```php
use SergeR\MagintB2BPlatformSDK\Type\OrderChangeStatus;

$statusRequest = new OrderChangeStatus(/* параметры */);
$api->orders->updateStatus('ORDER-123', $statusRequest);
```

#### Отменить заказ

```php
$api->orders->cancel('ORDER-123');

// Или с дополнительными данными
$api->orders->cancel('ORDER-123', [
    'reason' => 'Отмена по просьбе клиента'
]);
```

### Magnit Post API

API для работы с доставкой Магнит Пост.

#### Расчет стоимости доставки

```php
use SergeR\MagintB2BPlatformSDK\Type\EstimateOrderRequest;

$estimateRequest = new EstimateOrderRequest(
    'Московская область',  // Регион ПВЗ
    'Москва',              // Город ПВЗ
    'Санкт-Петербург',     // Город отправления
    'PVZ-001',             // Ключ ПВЗ (опционально)
    'ПВЗ на Тверской'      // Название ПВЗ (опционально)
);

$estimate = $api->magnitPost->estimateOrder($estimateRequest);

echo "Срок доставки: {$estimate->getFrom()}-{$estimate->getTo()} дней\n";
echo "Стоимость: " . ($estimate->getCost() / 100) . " руб.\n";
```

#### Создать заказ на доставку

```php
use SergeR\MagintB2BPlatformSDK\Type\DeliveryOrderRequest;

$deliveryRequest = new DeliveryOrderRequest(/* параметры */);
$deliveryOrder = $api->magnitPost->createOrder($deliveryRequest);

echo "Трек-номер: {$deliveryOrder->getTrackingNumber()}\n";
echo "Код получения: {$deliveryOrder->getPickupCode()}\n";
echo "Статус: {$deliveryOrder->getStatus()}\n";
```

#### Получить заказ

```php
$deliveryOrder = $api->magnitPost->getOrder('MP123456789');

echo "Статус: {$deliveryOrder->getStatus()}\n";

$payment = $deliveryOrder->getPayment();
echo "Объявленная стоимость: {$payment->getDeclaredValue()} коп.\n";

$delivery = $deliveryOrder->getDelivery();
echo "ПВЗ: {$delivery->getPickupPointKey()}\n";

$recipient = $delivery->getRecipient();
echo "Получатель: {$recipient->getFirstName()} {$recipient->getFamilyName()}\n";
```

#### Получить историю статусов

```php
$history = $api->magnitPost->getOrderStatusHistory('MP123456789');

echo "Трек-номер: {$history->getTrackingNumber()}\n";

foreach ($history->getStatuses() as $item) {
    $date = date('Y-m-d H:i:s', (int)$item->getTimestamp());
    echo "{$date}: {$item->getStatus()}\n";
}
```

#### Получить статусы нескольких заказов

```php
use SergeR\MagintB2BPlatformSDK\Type\DeliveryOrderStatusesRequest;

$statusesRequest = new DeliveryOrderStatusesRequest([
    'MP123456789',
    'MP987654321',
    'MP555666777'
]);

$statuses = $api->magnitPost->getOrdersStatuses($statusesRequest);

foreach ($statuses as $statusInfo) {
    echo "{$statusInfo->getTrackingNumber()}: {$statusInfo->getStatus()}\n";
}
```

#### Получить список пунктов выдачи

```php
$pickupPoints = $api->magnitPost->getPickupPoints(
    1,          // Номер страницы
    20,         // Размер страницы
    null,       // Ключ ПВЗ (опционально)
    null,       // Регион (опционально)
    'Москва'    // Город (опционально)
);

// Информация о пагинации
$pager = $pickupPoints->getPager();
echo "Всего ПВЗ: {$pager->getTotalItems()}\n";
echo "Страниц: {$pager->getTotalPages()}\n";
echo "Текущая страница: {$pager->getCurrentPage()}\n";

// Спис��к пунктов выдачи
foreach ($pickupPoints->getPickupPoints() as $point) {
    echo "\nПВЗ: {$point->getName()}\n";
    echo "Ключ: {$point->getKey()}\n";
    echo "Адрес: {$point->getAddress()}\n";
    echo "Город: {$point->getCity()}\n";
    echo "Регион: {$point->getRegion()}\n";
    
    // Координаты
    $coords = $point->getCoordinates();
    echo "Координаты: {$coords->getLatitude()}, {$coords->getLongitude()}\n";
    
    // Телефоны
    echo "Телефоны: " . implode(', ', $point->getPhones()) . "\n";
    
    // Часы работы
    echo "Часы работы:\n";
    foreach ($point->getWorkHours() as $hours) {
        echo "  {$hours->getDay()}: {$hours->getFrom()} - {$hours->getTill()}\n";
    }
}
```

#### Отменить заказ

```php
$api->magnitPost->deleteOrder('MP123456789');
echo "Заказ отменен\n";
```

### Last Mile API

API для работы с доставкой последней мили. Разделен на два подраздела: **Claims** (заявки) и **Partners** (партнеры).

#### Работа с заявками (Claims)

##### Создать заявку

```php
use SergeR\MagintB2BPlatformSDK\Type\Claim;

$claim = new Claim(/* параметры заявки */);
$response = $api->lastMile->claims->create(
    'partner-id',
    'unique-request-id',  // Ключ идемпотентности
    $claim
);

echo "ID заявки: {$response->getClaimId()}\n";
// или
echo "ID заявки: {$response->getId()}\n";
```

##### Принять заявку

```php
use SergeR\MagintB2BPlatformSDK\Type\RequestAcceptClaim;

$acceptRequest = new RequestAcceptClaim('claim-id-123');
$api->lastMile->claims->accept('partner-id', $acceptRequest);

echo "Заявка принята\n";
```

##### Отменить заявку

```php
use SergeR\MagintB2BPlatformSDK\Type\RequestCancelClaim;
use SergeR\MagintB2BPlatformSDK\Type\CancelByPartnerReason;

$cancelReason = new CancelByPartnerReason(
    'Отмена по просьбе клиента',
    'client_request'
);

$cancelRequest = new RequestCancelClaim('claim-id-123', $cancelReason);
$response = $api->lastMile->claims->cancel('partner-id', $cancelRequest);

echo "Заявка отменена: {$response->getClaimId()}\n";
```

##### Обновить заявку

```php
use SergeR\MagintB2BPlatformSDK\Type\UpdateClaim;
use SergeR\MagintB2BPlatformSDK\Type\UpdateClaimRoutePointsInner;
use SergeR\MagintB2BPlatformSDK\Type\UpdateClaimRoutePointsInnerAddress;

// Создаем точки маршрута
$address1 = new UpdateClaimRoutePointsInnerAddress('Забрать у входа');
$routePoint1 = new UpdateClaimRoutePointsInner('source', 'CODE-1', $address1);

$address2 = new UpdateClaimRoutePointsInnerAddress('Доставить на 5 этаж');
$routePoint2 = new UpdateClaimRoutePointsInner('destination', 'CODE-2', $address2);

// Обновляем заявку
$updateRequest = new UpdateClaim('claim-id-123', [$routePoint1, $routePoint2]);
$api->lastMile->claims->update('partner-id', $updateRequest);

echo "Заявка обновлена\n";
```

##### Получить информацию о заявках

```php
use SergeR\MagintB2BPlatformSDK\Type\RequestClaimsInfo;

$infoRequest = new RequestClaimsInfo([
    'claim-id-1',
    'claim-id-2',
    'claim-id-3'
]);

$info = $api->lastMile->claims->getInfo('partner-id', $infoRequest);

// Обработка информации о заявках
foreach ($info->getClaims() as $claim) {
    echo "Заявка: {$claim->getId()}, Статус: {$claim->getStatus()}\n";
}
```

##### Получить события заявок

```php
$events = $api->lastMile->claims->getEvents(
    'partner-id',
    'last-known-event-id',  // ID последнего известного события (опционально)
    100                      // Лимит (по умолчанию 1000)
);

foreach ($events as $claimEvent) {
    echo "Событие ID: {$claimEvent->getId()}\n";
    echo "Заявка ID: {$claimEvent->getClaimId()}\n";
    echo "Время: {$claimEvent->getEventTime()->format('Y-m-d H:i:s')}\n";
    
    $event = $claimEvent->getEvent();
    echo "Новый статус: {$event->getNewStatus()}\n";
    
    $payload = $event->getPayload();
    echo "Имя: {$payload->getName()}\n";
    echo "Телефон: {$payload->getPhone()}\n";
}
```

#### Работа с партнерами (Partners)

##### Получить информацию о партнере

```php
$partner = $api->lastMile->partners->get('partner-id');

echo "ID: {$partner->getPartnerId()}\n";
echo "Название: {$partner->getName()}\n";
echo "Email: {$partner->getEmail()}\n";
echo "Отображаемое имя: {$partner->getDisplayName()}\n";
echo "Родитель: {$partner->getParent()}\n";

$config = $partner->getConfig();
print_r($config);
```

##### Обновить партнера

```php
use SergeR\MagintB2BPlatformSDK\Type\UpdatePartnerRequest;

$updateRequest = new UpdatePartnerRequest(
    'Новое название',
    'new-email@example.com',
    'parent-partner-id',
    ['setting1' => 'value1']
);

$api->lastMile->partners->update('partner-id', $updateRequest);

echo "Партнер обновлен\n";
```

##### Получить конфиг партнера в логзоне

```php
$config = $api->lastMile->partners->getLogzoneConfig(
    'partner-id',
    'logzone_id',  // Критерий выборки (logzone_id, store_id)
    'default'      // Тип настроек (опционально)
);

echo "SLA: {$config->getSla()}\n";
echo "Макс. вес: {$config->getMaxOrderWeight()}\n";
echo "Макс. дистанция: {$config->getMaxDeliveryDistance()}\n";
echo "Провайдер: {$config->getDeliveryProvider()}\n";

// Интервалы прибытия в ПВЗ
foreach ($config->getDeferredPickupPointArrivalIntervals() as $interval) {
    echo "Интервал: {$interval->getLowerBorder()} - {$interval->getUpperBorder()}\n";
}
```

##### Обновить конфиг партнера в логзоне

```php
use SergeR\MagintB2BPlatformSDK\Type\PartnerConfig;
use SergeR\MagintB2BPlatformSDK\Type\PartnerConfigPickupPointArrivalInterval;
use SergeR\MagintB2BPlatformSDK\Type\PartnerConfigDeliveryProvider;

$interval1 = new PartnerConfigPickupPointArrivalInterval('10:00', '12:00');
$interval2 = new PartnerConfigPickupPointArrivalInterval('14:00', '16:00');

$config = new PartnerConfig(
    '30m',                                          // Ожидаемое время прибытия курьера
    '15m',                                          // Макс. время поиска исполнителя
    '2h',                                           // SLA
    '10m',                                          // Макс. время принятия заказа
    5000,                                           // Макс. вес (граммы)
    10000,                                          // Макс. дистанция (метры)
    PartnerConfigDeliveryProvider::DELIVERY_SERVICE, // Провайдер
    [$interval1, $interval2]                        // Интервалы
);

$api->lastMile->partners->updateLogzoneConfig('partner-id', $config);

echo "Конфиг обновлен\n";
```

##### Заменить тарифы партнера

```php
$api->lastMile->replaceRates('partner-id', '/path/to/rates.csv');

echo "Тарифы обновлены\n";
```

## Обработка ошибок

SDK выбрасывает исключение `ApiException` при ошибках API:

```php
use SergeR\MagintB2BPlatformSDK\ApiException;

try {
    $order = $api->orders->get('ORDER-123');
} catch (ApiException $e) {
    echo "Ошибка API: {$e->getMessage()}\n";
    echo "HTTP код: {$e->getCode()}\n";
    
    // Получить тело ответа
    $responseBody = $e->getResponseBody();
    if ($responseBody) {
        $error = json_decode($responseBody, true);
        echo "Детали: " . print_r($error, true) . "\n";
    }
}
```

## DTO (Data Transfer Objects)

Все данные передаются через типизированные DTO объекты.

### Создание DTO

```php
use SergeR\MagintB2BPlatformSDK\Type\EstimateOrderRequest;

// Через конструктор
$request = new EstimateOrderRequest(
    'Московская область',
    'Москва',
    'Санкт-Петербург'
);

// Из массива
$request = EstimateOrderRequest::fromArray([
    'pup_region' => 'Московская область',
    'pup_city' => 'Москва',
    'city_from' => 'Санкт-Петербург'
]);
```

### Получение данных из DTO

```php
$order = $api->orders->get('ORDER-123');

// Через геттеры
$id = $order->getId();
$status = $order->getStatus();

// В массив
$array = $order->toArray();

// В JSON
$json = json_encode($order); // Благодаря JsonSerializable
```

## Архитектура

### Структура проекта

```
src/
├── MagnitApi.php              # Единая точка входа
├── MagnitClient.php           # HTTP клиент с middleware
├── Config.php                 # Конфигурация
├── ApiException.php           # Исключение для ошибок API
├── Api/
│   ├── AbstractApi.php        # Базовый класс для API
│   ├── AuthApi.php            # API авторизации (служебный)
│   ├── OrdersApi.php          # API заказов (5 методов)
│   ├── MagnitPostApi.php      # API Магнит Пост (7 методов)
│   ├── LastMileApi.php        # Фасад для Last Mile API
│   ├── LastMileClaimsApi.php  # API заявок (6 методов)
│   └── LastMilePartnersApi.php # API партнеров (4 метода)
├── TokenStorage/
│   ├── TokenStorageInterface.php
│   ├── MemoryTokenStorage.php
│   └── FileTokenStorage.php
├── Middleware/
│   ├── AuthorizationMiddleware.php
│   ├── TokenRefreshMiddleware.php
│   └── LoggerMiddleware.php
└── Type/                      # DTO классы
    ├── Order.php
    ├── OrderStatus.php
    ├── EstimateOrderRequest.php
    ├── Claim.php
    ├── Partner.php
    ├── PartnerConfig.php
    └── ...
```

### Middleware Stack

SDK использует middleware для обработки запросов:

1. **LoggerMiddleware** (опционально) - логирование запросов/ответов
2. **AuthorizationMiddleware** - добавление токена авторизации
3. **TokenRefreshMiddleware** - автоматическое обновление токена при 401

### Автоматическое обновление токенов

SDK автоматически обновляет токены при истечении срока действия. Вам не нужно беспокоиться об авторизации.

## Особенности

✅ **Типизация PHP 7.4** - все свойства и методы типизированы  
✅ **Immutable DTO** - объекты данных неизменяемые  
✅ **Автоматическое обновление токенов** - не нужно думать об авторизации  
✅ **PSR-3 логирование** - интеграция с любым PSR-3 логгером  
✅ **Гибкое хранение токенов** - в памяти, файле или своя реализация  
✅ **Чистый код** - без лишних зависимостей и сложностей  
✅ **Единая точка входа** - удобный API через `MagnitApi`  

## Лицензия

MIT

## Поддержка

При возникновении проблем создайте issue в репозитории проекта.
