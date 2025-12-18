<?php
/**
 * MagnitMarketApi - Упрощенная версия
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

declare(strict_types=1);

namespace SergeR\MagintB2BPlatformSDK\Api;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use SergeR\MagintB2BPlatformSDK\ApiException;

/**
 * MagnitMarketApi - API для работы с Магнит Маркетплейс
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 *
 * @todo Разделить на несколько частей: products, orders, parcels и т.д.
 */
class MagnitMarketApi extends AbstractApi
{
    /**
     * Архивация СКУ
     *
     * @param int $shopId Идентификатор магазина
     * @param \SergeR\MagintB2BPlatformSDK\Type\SkuArchiveRequest $skuArchiveRequest
     * @return mixed
     * @throws ApiException
     * @throws GuzzleException
     */
    public function archiveSkuList(int $shopId, \SergeR\MagintB2BPlatformSDK\Type\SkuArchiveRequest $skuArchiveRequest)
    {
        $request = new Request(
            'POST',
            $this->buildAbsoluteRequestUri('/seller/v1/products/sku/shops/' . $shopId . '/sku/archive'),
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            json_encode($skuArchiveRequest, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        );

        $data = $this->sendJsonRequest($request);
        return $data;
    }

    /**
     * Создание СКУ
     *
     * @param \SergeR\MagintB2BPlatformSDK\Type\CreateSkuRequest $createSkuRequest
     * @return mixed
     * @throws ApiException
     * @throws GuzzleException
     */
    public function createSku(\SergeR\MagintB2BPlatformSDK\Type\CreateSkuRequest $createSkuRequest)
    {
        $request = new Request(
            'POST',
            $this->buildAbsoluteRequestUri('/seller/v1/products/sku'),
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            json_encode($createSkuRequest, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        );

        $data = $this->sendJsonRequest($request);
        return $data;
    }

    /**
     * Удаление продукта
     *
     * @param int $shopId Идентификатор магазина
     * @param \SergeR\MagintB2BPlatformSDK\Type\ProductDeleteRequest $productDeleteRequest
     * @return mixed
     * @throws ApiException
     * @throws GuzzleException
     */
    public function deleteProduct(int $shopId, $productDeleteRequest)
    {
        $request = new Request(
            'POST',
            $this->buildAbsoluteRequestUri('/seller/v1/products/sku/shops/' . $shopId . '/sku/delete'),
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            json_encode($productDeleteRequest, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        );

        $data = $this->sendJsonRequest($request);
        return $data;
    }

    /**
     * Получение списка категорий
     *
     * @return array
     * @throws ApiException
     * @throws GuzzleException
     */
    public function getActiveCategories(): array
    {
        $request = new Request(
            'GET',
            $this->buildAbsoluteRequestUri('/seller/v1/categories'),
            ['Accept' => 'application/json']
        );

        $data = $this->sendJsonRequest($request);
        return $data;
    }

    /**
     * Получение списка характеристик
     *
     * @param \SergeR\MagintB2BPlatformSDK\Type\CategoryCharacteristicsRequest $categoryCharacteristicsRequest
     * @return array
     * @throws ApiException
     * @throws GuzzleException
     */
    public function getDefinedCharacteristics($categoryCharacteristicsRequest): array
    {
        $request = new Request(
            'POST',
            $this->buildAbsoluteRequestUri('/seller/v1/products/defined-characteristics'),
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            json_encode($categoryCharacteristicsRequest, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        );

        $data = $this->sendJsonRequest($request);
        return $data;
    }

    /**
     * Получение списка словарей
     *
     * @param int $dictionaryId Идентификатор справочника
     * @param string $type Тип справочника (например, DEFINED, PRODUCT, SKU)
     * @param string $search Поисковый запрос для фильтрации значений справочника
     * @param int $page Номер страницы для пагинации
     * @param int $pageSize Количество элементов на странице
     * @return mixed
     * @throws ApiException
     * @throws GuzzleException
     */
    public function getDictionaryValues(
        int $dictionaryId,
        string $type,
        string $search = '',
        int $page = 0,
        int $pageSize = 10
    ) {
        $queryParams = [
            'dictionary_id' => $dictionaryId,
            'type' => $type,
            'search' => $search,
            'page' => $page,
            'page_size' => $pageSize,
        ];

        $query = http_build_query($queryParams);

        $request = new Request(
            'GET',
            $this->buildAbsoluteRequestUri('/seller/v1/products/dictionary?' . $query),
            ['Accept' => 'application/json']
        );

        $data = $this->sendJsonRequest($request);
        return $data;
    }

    /**
     * Получение данных по ценам
     *
     * @param \SergeR\MagintB2BPlatformSDK\Type\SkuInfoRequest $skuInfoRequest
     * @return mixed
     * @throws ApiException
     * @throws GuzzleException
     */
    public function getPriceInfo($skuInfoRequest)
    {
        $request = new Request(
            'POST',
            $this->buildAbsoluteRequestUri('/seller/v1/products/sku/price/info'),
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            json_encode($skuInfoRequest, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        );

        $data = $this->sendJsonRequest($request);
        return $data;
    }

    /**
     * Получение списка магазинов
     *
     * @return array
     * @throws ApiException
     * @throws GuzzleException
     */
    public function getShops(): array
    {
        $request = new Request(
            'GET',
            $this->buildAbsoluteRequestUri('/seller/v1/shops'),
            ['Accept' => 'application/json']
        );

        $data = $this->sendJsonRequest($request);
        return $data;
    }

    /**
     * Получение списка СКУ с основной информацией
     *
     * @param int $shopId Идентификатор магазина
     * @param \SergeR\MagintB2BPlatformSDK\Type\ShortSkuInfoRequest $shortSkuInfoRequest
     * @return mixed
     * @throws ApiException
     * @throws GuzzleException
     */
    public function getShortSkuInfoList(int $shopId, $shortSkuInfoRequest)
    {
        $request = new Request(
            'POST',
            $this->buildAbsoluteRequestUri('/seller/v1/products/sku/shops/' . $shopId . '/short/list'),
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            json_encode($shortSkuInfoRequest, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        );

        $data = $this->sendJsonRequest($request);
        return $data;
    }

    /**
     * Получение списка СКУ
     *
     * @param \SergeR\MagintB2BPlatformSDK\Type\SkuListRequest $skuListRequest
     * @return mixed
     * @throws ApiException
     * @throws GuzzleException
     */
    public function getSkuList($skuListRequest)
    {
        $request = new Request(
            'POST',
            $this->buildAbsoluteRequestUri('/seller/v1/products/sku/list'),
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            json_encode($skuListRequest, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        );

        $data = $this->sendJsonRequest($request);
        return $data;
    }

    /**
     * Получение информации об остатках
     *
     * @param \SergeR\MagintB2BPlatformSDK\Type\SkuInfoRequest $skuInfoRequest
     * @return mixed
     * @throws ApiException
     * @throws GuzzleException
     */
    public function getStocksInfo($skuInfoRequest)
    {
        $request = new Request(
            'POST',
            $this->buildAbsoluteRequestUri('/seller/v1/products/sku/stocks/info'),
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            json_encode($skuInfoRequest, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        );

        $data = $this->sendJsonRequest($request);
        return $data;
    }

    /**
     * Получение статуса задачи создания СКУ
     *
     * @param string $taskId Идентификатор задачи создания СКУ
     * @return mixed
     * @throws ApiException
     * @throws GuzzleException
     */
    public function getTaskStatus(string $taskId)
    {
        $request = new Request(
            'GET',
            $this->buildAbsoluteRequestUri('/seller/v1/products/sku/tasks/' . urlencode($taskId) . '/status'),
            ['Accept' => 'application/json']
        );

        $data = $this->sendJsonRequest($request);
        return $data;
    }

    /**
     * Отмена части товаров
     *
     * @param \SergeR\MagintB2BPlatformSDK\Type\MarketplaceOrderCancelItemsRequest $marketplaceOrderCancelItemsRequest
     * @return mixed
     * @throws ApiException
     * @throws GuzzleException
     */
    public function ordersCancelItemsMarket($marketplaceOrderCancelItemsRequest)
    {
        $request = new Request(
            'POST',
            $this->buildAbsoluteRequestUri('/seller/v1/orders/cancel-items'),
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            json_encode($marketplaceOrderCancelItemsRequest, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        );

        $data = $this->sendJsonRequest($request);
        return $data;
    }

    /**
     * Отмена задания на сборку
     *
     * @param \SergeR\MagintB2BPlatformSDK\Type\MarketplaceOrderCancelRequest $marketplaceOrderCancelRequest
     * @return mixed
     * @throws ApiException
     * @throws GuzzleException
     */
    public function ordersCancelMarket($marketplaceOrderCancelRequest)
    {
        $request = new Request(
            'POST',
            $this->buildAbsoluteRequestUri('/seller/v1/orders/cancel'),
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            json_encode($marketplaceOrderCancelRequest, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        );

        $data = $this->sendJsonRequest($request);
        return $data;
    }

    /**
     * Подтверждение сборки
     *
     * @param \SergeR\MagintB2BPlatformSDK\Type\MarketplaceOrderCompleteRequest $marketplaceOrderCompleteRequest
     * @return mixed
     * @throws ApiException
     * @throws GuzzleException
     */
    public function ordersCompleteMarket($marketplaceOrderCompleteRequest)
    {
        $request = new Request(
            'POST',
            $this->buildAbsoluteRequestUri('/seller/v1/orders/complete'),
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            json_encode($marketplaceOrderCompleteRequest, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        );

        $data = $this->sendJsonRequest($request);
        return $data;
    }

    /**
     * Список заданий на сборку
     *
     * @param \SergeR\MagintB2BPlatformSDK\Type\MarketplaceOrdersListRequest $marketplaceOrdersListRequest
     * @return mixed
     * @throws ApiException
     * @throws GuzzleException
     */
    public function ordersListMarket($marketplaceOrdersListRequest)
    {
        $request = new Request(
            'POST',
            $this->buildAbsoluteRequestUri('/seller/v1/orders/list'),
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            json_encode($marketplaceOrdersListRequest, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        );

        $data = $this->sendJsonRequest($request);
        return $data;
    }

    /**
     * Передать разбиение на посылки
     *
     * @param \SergeR\MagintB2BPlatformSDK\Type\MarketplaceOrderParcelsRequest $marketplaceOrderParcelsRequest
     * @return mixed
     * @throws ApiException
     * @throws GuzzleException
     */
    public function ordersParcelsMarket($marketplaceOrderParcelsRequest)
    {
        $request = new Request(
            'POST',
            $this->buildAbsoluteRequestUri('/seller/v1/orders/parcels'),
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            json_encode($marketplaceOrderParcelsRequest, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        );

        $data = $this->sendJsonRequest($request);
        return $data;
    }

    /**
     * Список необработанных заданий на сборку
     *
     * @param \SergeR\MagintB2BPlatformSDK\Type\MarketplaceOrdersUnprocessedRequest $marketplaceOrdersUnprocessedRequest
     * @return mixed
     * @throws ApiException
     * @throws GuzzleException
     */
    public function ordersUnprocessedMarket($marketplaceOrdersUnprocessedRequest)
    {
        $request = new Request(
            'POST',
            $this->buildAbsoluteRequestUri('/seller/v1/orders/unprocessed'),
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            json_encode($marketplaceOrdersUnprocessedRequest, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        );

        $data = $this->sendJsonRequest($request);
        return $data;
    }

    /**
     * Отмена посылок
     *
     * @param \SergeR\MagintB2BPlatformSDK\Type\MarketplaceParcelsCancelRequest|null $marketplaceParcelsCancelRequest
     * @return mixed
     * @throws ApiException
     * @throws GuzzleException
     */
    public function parcelsCancelMarket($marketplaceParcelsCancelRequest = null)
    {
        $request = new Request(
            'POST',
            $this->buildAbsoluteRequestUri('/seller/v1/parcels/cancel'),
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            $marketplaceParcelsCancelRequest ? json_encode($marketplaceParcelsCancelRequest, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) : ''
        );

        $data = $this->sendJsonRequest($request);
        return $data;
    }

    /**
     * Создание посылок
     *
     * @param \SergeR\MagintB2BPlatformSDK\Type\MarketplaceParcelsCreateRequest|null $marketplaceParcelsCreateRequest
     * @return mixed
     * @throws ApiException
     * @throws GuzzleException
     */
    public function parcelsCreateMarket($marketplaceParcelsCreateRequest = null)
    {
        $request = new Request(
            'POST',
            $this->buildAbsoluteRequestUri('/seller/v1/parcels/create'),
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            $marketplaceParcelsCreateRequest ? json_encode($marketplaceParcelsCreateRequest, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) : ''
        );

        $data = $this->sendJsonRequest($request);
        return $data;
    }

    /**
     * Получение ярлыков для посылок
     *
     * @param string $accept
     * @param \SergeR\MagintB2BPlatformSDK\Type\MarketplaceParcelsLabelsRequest|null $marketplaceParcelsLabelsRequest
     * @return mixed
     * @throws ApiException
     * @throws GuzzleException
     */
    public function parcelsGetLabelsMarket(string $accept = 'application/json', $marketplaceParcelsLabelsRequest = null)
    {
        $request = new Request(
            'POST',
            $this->buildAbsoluteRequestUri('/seller/v1/parcels/labels'),
            [
                'Accept' => $accept,
                'Content-Type' => 'application/json',
            ],
            $marketplaceParcelsLabelsRequest ? json_encode($marketplaceParcelsLabelsRequest, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) : ''
        );

        $data = $this->sendJsonRequest($request);
        return $data;
    }

    /**
     * Список посылок
     *
     * @param \SergeR\MagintB2BPlatformSDK\Type\MarketplaceParcelsListRequest|null $marketplaceParcelsListRequest
     * @return mixed
     * @throws ApiException
     * @throws GuzzleException
     */
    public function parcelsListMarket($marketplaceParcelsListRequest = null)
    {
        $request = new Request(
            'POST',
            $this->buildAbsoluteRequestUri('/seller/v1/parcels/list'),
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            $marketplaceParcelsListRequest ? json_encode($marketplaceParcelsListRequest, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) : ''
        );

        $data = $this->sendJsonRequest($request);
        return $data;
    }

    /**
     * Добавление маркировки к посылкам
     *
     * @param \SergeR\MagintB2BPlatformSDK\Type\MarketplaceParcelsAddMarkingRequest|null $marketplaceParcelsAddMarkingRequest
     * @return mixed
     * @throws ApiException
     * @throws GuzzleException
     */
    public function parcelsMarkingMarket($marketplaceParcelsAddMarkingRequest = null)
    {
        $request = new Request(
            'POST',
            $this->buildAbsoluteRequestUri('/seller/v1/parcels/marking'),
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            $marketplaceParcelsAddMarkingRequest ? json_encode($marketplaceParcelsAddMarkingRequest, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) : ''
        );

        $data = $this->sendJsonRequest($request);
        return $data;
    }

    /**
     * Распаковка посылок
     *
     * @param \SergeR\MagintB2BPlatformSDK\Type\MarketplaceParcelsUnpackRequest|null $marketplaceParcelsUnpackRequest
     * @return mixed
     * @throws ApiException
     * @throws GuzzleException
     */
    public function parcelsUnpackMarket($marketplaceParcelsUnpackRequest = null)
    {
        $request = new Request(
            'POST',
            $this->buildAbsoluteRequestUri('/seller/v1/parcels/unpack'),
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            $marketplaceParcelsUnpackRequest ? json_encode($marketplaceParcelsUnpackRequest, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) : ''
        );

        $data = $this->sendJsonRequest($request);
        return $data;
    }

    /**
     * Восстановление СКУ из архива
     *
     * @param int $shopId Идентификатор магазина
     * @param \SergeR\MagintB2BPlatformSDK\Type\SkuArchiveRequest $skuArchiveRequest
     * @return mixed
     * @throws ApiException
     * @throws GuzzleException
     */
    public function recoverSkuList(int $shopId, $skuArchiveRequest)
    {
        $request = new Request(
            'POST',
            $this->buildAbsoluteRequestUri('/seller/v1/products/sku/shops/' . $shopId . '/sku/recover'),
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            json_encode($skuArchiveRequest, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        );

        $data = $this->sendJsonRequest($request);
        return $data;
    }

    /**
     * Добавить посылки в отгрузку
     *
     * @param \SergeR\MagintB2BPlatformSDK\Type\MarketplaceShipmentAddParcelsRequest $marketplaceShipmentAddParcelsRequest
     * @return mixed
     * @throws ApiException
     * @throws GuzzleException
     */
    public function shipmentsAddParcelsMarket($marketplaceShipmentAddParcelsRequest)
    {
        $request = new Request(
            'POST',
            $this->buildAbsoluteRequestUri('/seller/v1/shipments/add-parcels'),
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            json_encode($marketplaceShipmentAddParcelsRequest, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        );

        $data = $this->sendJsonRequest($request);
        return $data;
    }

    /**
     * Отменить отгрузку
     *
     * @param \SergeR\MagintB2BPlatformSDK\Type\MarketplaceShipmentsCancelRequest $marketplaceShipmentsCancelRequest
     * @return mixed
     * @throws ApiException
     * @throws GuzzleException
     */
    public function shipmentsCancelMarket($marketplaceShipmentsCancelRequest)
    {
        $request = new Request(
            'POST',
            $this->buildAbsoluteRequestUri('/seller/v1/shipments/cancel'),
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            json_encode($marketplaceShipmentsCancelRequest, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        );

        $data = $this->sendJsonRequest($request);
        return $data;
    }

    /**
     * Подтвердить отгрузку
     *
     * @param \SergeR\MagintB2BPlatformSDK\Type\MarketplaceShipmentsConfirmRequest $marketplaceShipmentsConfirmRequest
     * @return mixed
     * @throws ApiException
     * @throws GuzzleException
     */
    public function shipmentsConfirmMarket($marketplaceShipmentsConfirmRequest)
    {
        $request = new Request(
            'POST',
            $this->buildAbsoluteRequestUri('/seller/v1/shipments/confirm'),
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            json_encode($marketplaceShipmentsConfirmRequest, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        );

        $data = $this->sendJsonRequest($request);
        return $data;
    }

    /**
     * Получить документы отгрузки
     *
     * @param string $accept
     * @param \SergeR\MagintB2BPlatformSDK\Type\MarketplaceShipmentDocumentsRequest|null $marketplaceShipmentDocumentsRequest
     * @return mixed
     * @throws ApiException
     * @throws GuzzleException
     */
    public function shipmentsGetDocumentsMarket(
        string $accept = 'application/json',
        $marketplaceShipmentDocumentsRequest = null
    ) {
        $request = new Request(
            'POST',
            $this->buildAbsoluteRequestUri('/seller/v1/shipments/documents'),
            [
                'Accept' => $accept,
                'Content-Type' => 'application/json',
            ],
            $marketplaceShipmentDocumentsRequest ? json_encode($marketplaceShipmentDocumentsRequest, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) : ''
        );

        $data = $this->sendJsonRequest($request);
        return $data;
    }

    /**
     * Список отгрузок
     *
     * @param \SergeR\MagintB2BPlatformSDK\Type\MarketplaceShipmentListRequest|null $marketplaceShipmentListRequest
     * @return mixed
     * @throws ApiException
     * @throws GuzzleException
     */
    public function shipmentsListMarket($marketplaceShipmentListRequest = null)
    {
        $request = new Request(
            'POST',
            $this->buildAbsoluteRequestUri('/seller/v1/shipments/list'),
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            $marketplaceShipmentListRequest ? json_encode($marketplaceShipmentListRequest, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) : ''
        );

        $data = $this->sendJsonRequest($request);
        return $data;
    }

    /**
     * Удалить посылки из отгр��зки
     *
     * @param \SergeR\MagintB2BPlatformSDK\Type\MarketplaceShipmentRemoveParcelsRequest $marketplaceShipmentRemoveParcelsRequest
     * @return mixed
     * @throws ApiException
     * @throws GuzzleException
     */
    public function shipmentsRemoveParcelsMarket($marketplaceShipmentRemoveParcelsRequest)
    {
        $request = new Request(
            'POST',
            $this->buildAbsoluteRequestUri('/seller/v1/shipments/remove-parcels'),
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            json_encode($marketplaceShipmentRemoveParcelsRequest, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        );

        $data = $this->sendJsonRequest($request);
        return $data;
    }

    /**
     * Обновление цен
     *
     * @param \SergeR\MagintB2BPlatformSDK\Type\PricesRequest $pricesRequest
     * @return mixed
     * @throws ApiException
     * @throws GuzzleException
     */
    public function update($pricesRequest)
    {
        $request = new Request(
            'POST',
            $this->buildAbsoluteRequestUri('/seller/v1/products/sku/price'),
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            json_encode($pricesRequest, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        );

        $data = $this->sendJsonRequest($request);
        return $data;
    }

    /**
     * Обновление СКУ
     *
     * @param int $shopId
     * @param \SergeR\MagintB2BPlatformSDK\Type\UpdateSkuRequest $updateSkuRequest
     * @return mixed
     * @throws ApiException
     * @throws GuzzleException
     */
    public function updateSku(int $shopId, $updateSkuRequest)
    {
        $request = new Request(
            'POST',
            $this->buildAbsoluteRequestUri('/seller/v1/products/sku/shops/' . $shopId . '/sku/update'),
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            json_encode($updateSkuRequest, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        );

        $data = $this->sendJsonRequest($request);
        return $data;
    }

    /**
     * Обновление остатков
     *
     * @param \SergeR\MagintB2BPlatformSDK\Type\StockRequest $stockRequest
     * @return void
     * @throws ApiException
     * @throws GuzzleException
     */
    public function updateStocks($stockRequest): void
    {
        $request = new Request(
            'POST',
            $this->buildAbsoluteRequestUri('/seller/v1/products/sku/stocks'),
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            json_encode($stockRequest, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        );

        $this->sendRequest($request);
    }
}
