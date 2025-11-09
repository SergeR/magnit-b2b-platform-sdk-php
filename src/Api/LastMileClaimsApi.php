<?php
/**
 * LastMileClaimsApi - API для работы с заявками последней мили
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
use SergeR\MagintB2BPlatformSDK\Type\Claim;
use SergeR\MagintB2BPlatformSDK\Type\ClaimsEvent;
use SergeR\MagintB2BPlatformSDK\Type\RequestAcceptClaim;
use SergeR\MagintB2BPlatformSDK\Type\RequestCancelClaim;
use SergeR\MagintB2BPlatformSDK\Type\RequestClaimsInfo;
use SergeR\MagintB2BPlatformSDK\Type\ResponseCancelClaim;
use SergeR\MagintB2BPlatformSDK\Type\ResponseClaimsInfo;
use SergeR\MagintB2BPlatformSDK\Type\ResponseCreateClaim;
use SergeR\MagintB2BPlatformSDK\Type\UpdateClaim;

/**
 * LastMileClaimsApi - API для работы с заявками последней мили
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class LastMileClaimsApi extends AbstractApi
{
    /**
     * Создать заявку на доставку
     *
     * @param string $partnerId ID партнера
     * @param string $requestId Ключ идемпотентности
     * @param Claim $claim Данные заявки
     * @return ResponseCreateClaim
     * @throws ApiException
     * @throws GuzzleException
     */
    public function create(string $partnerId, string $requestId, Claim $claim): ResponseCreateClaim
    {
        $request = new Request(
            'POST',
            '/v1/last-mile/claims/create?request_id=' . urlencode($requestId),
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'X-Partner-ID' => $partnerId,
            ],
            json_encode($claim, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        );

        $data = $this->sendJsonRequest($request);
        return ResponseCreateClaim::fromArray($data);
    }

    /**
     * Принять заявку
     *
     * @param string $partnerId ID партнера
     * @param RequestAcceptClaim $acceptRequest Данные для принятия заявки
     * @return void
     * @throws ApiException
     * @throws GuzzleException
     */
    public function accept(string $partnerId, RequestAcceptClaim $acceptRequest): void
    {
        $request = new Request(
            'POST',
            '/v1/last-mile/claims/accept',
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'X-Partner-ID' => $partnerId,
            ],
            json_encode($acceptRequest, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        );

        $this->sendRequest($request);
    }

    /**
     * Отменить заявку
     *
     * @param string $partnerId ID партнера
     * @param RequestCancelClaim $cancelRequest Данные для отмены заявки
     * @return ResponseCancelClaim
     * @throws ApiException
     * @throws GuzzleException
     */
    public function cancel(string $partnerId, RequestCancelClaim $cancelRequest): ResponseCancelClaim
    {
        $request = new Request(
            'POST',
            '/v1/last-mile/claims/cancel',
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'X-Partner-ID' => $partnerId,
            ],
            json_encode($cancelRequest, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        );

        $data = $this->sendJsonRequest($request);
        return ResponseCancelClaim::fromArray($data);
    }

    /**
     * Обновить заявку
     *
     * @param string $partnerId ID партнера
     * @param UpdateClaim $updateRequest Данные для обновления заявки
     * @return void
     * @throws ApiException
     * @throws GuzzleException
     */
    public function update(string $partnerId, UpdateClaim $updateRequest): void
    {
        $request = new Request(
            'POST',
            '/v1/last-mile/claims/update',
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'X-Partner-ID' => $partnerId,
            ],
            json_encode($updateRequest, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        );

        $this->sendRequest($request);
    }

    /**
     * Получить информацию о заявках
     *
     * @param string $partnerId ID партнера
     * @param RequestClaimsInfo $infoRequest Запрос информации о заявках
     * @return ResponseClaimsInfo
     * @throws ApiException
     * @throws GuzzleException
     */
    public function getInfo(string $partnerId, RequestClaimsInfo $infoRequest): ResponseClaimsInfo
    {
        $request = new Request(
            'POST',
            '/v1/last-mile/claims/info',
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'X-Partner-ID' => $partnerId,
            ],
            json_encode($infoRequest, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        );

        $data = $this->sendJsonRequest($request);
        return ResponseClaimsInfo::fromArray($data);
    }

    /**
     * Получить события заявок
     *
     * @param string $partnerId ID партнера
     * @param string|null $lastKnownId ID последнего известного события
     * @param int $limit Максимальное количество событий (по умолчанию 1000)
     * @return ClaimsEvent[]
     * @throws ApiException
     * @throws GuzzleException
     */
    public function getEvents(string $partnerId, ?string $lastKnownId = null, int $limit = 1000): array
    {
        $queryParams = ['limit' => $limit];
        if ($lastKnownId !== null) {
            $queryParams['last_known_id'] = $lastKnownId;
        }

        $query = http_build_query($queryParams);
        $request = new Request(
            'GET',
            '/v1/last-mile/claims/events?' . $query,
            [
                'Accept' => 'application/json',
                'X-Partner-ID' => $partnerId,
            ]
        );

        $data = $this->sendJsonRequest($request);

        $events = [];
        foreach ($data as $item) {
            $events[] = ClaimsEvent::fromArray($item);
        }

        return $events;
    }
}
