<?php
/**
 * LoggerMiddleware - PSR-3 Logger для HTTP запросов
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

namespace SergeR\MagintB2BPlatformSDK\Middleware;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

/**
 * LoggerMiddleware - Логирование HTTP запросов и ответов
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */
class LoggerMiddleware
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * Constructor
     *
     * @param LoggerInterface $logger PSR-3 Logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Invoke middleware
     *
     * @param callable $handler
     * @return callable
     */
    public function __invoke(callable $handler): callable
    {
        return function (RequestInterface $request, array $options) use ($handler) {
            $startTime = microtime(true);

            // Логируем запрос
            $this->logRequest($request);

            return $handler($request, $options)->then(
                function (ResponseInterface $response) use ($request, $startTime) {
                    // Логируем успешный ответ
                    $this->logResponse($request, $response, $startTime);
                    return $response;
                },
                function ($reason) use ($request, $startTime) {
                    // Логируем ошибку
                    $this->logError($request, $reason, $startTime);
                    throw $reason;
                }
            );
        };
    }

    /**
     * Логирование запроса
     *
     * @param RequestInterface $request
     * @return void
     */
    private function logRequest(RequestInterface $request): void
    {
        $message = sprintf(
            'HTTP Request: %s %s',
            $request->getMethod(),
            $request->getUri()
        );

        $context = [
            'method' => $request->getMethod(),
            'uri' => (string) $request->getUri(),
            'headers' => $this->sanitizeHeaders($request->getHeaders()),
        ];

        // Добавляем тело запроса, если есть
        $body = (string) $request->getBody();
        if ($body) {
            $context['body'] = $this->sanitizeBody($body);
        }

        $this->logger->info($message, $context);
    }

    /**
     * Логирование ответа
     *
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @param float $startTime
     * @return void
     */
    private function logResponse(
        RequestInterface $request,
        ResponseInterface $response,
        float $startTime
    ): void {
        $duration = round((microtime(true) - $startTime) * 1000, 2);

        $message = sprintf(
            'HTTP Response: %s %s - %d %s (%s ms)',
            $request->getMethod(),
            $request->getUri(),
            $response->getStatusCode(),
            $response->getReasonPhrase(),
            $duration
        );

        $context = [
            'method' => $request->getMethod(),
            'uri' => (string) $request->getUri(),
            'status_code' => $response->getStatusCode(),
            'reason_phrase' => $response->getReasonPhrase(),
            'duration_ms' => $duration,
            'headers' => $response->getHeaders(),
        ];

        // Добавляем тело ответа
        $body = (string) $response->getBody();
        if ($body) {
            $context['body'] = $this->sanitizeBody($body);
        }

        // Выбираем уровень логирования в зависимости от статуса
        $level = $this->getLogLevel($response->getStatusCode());
        $this->logger->log($level, $message, $context);
    }

    /**
     * Логирование ошибки
     *
     * @param RequestInterface $request
     * @param mixed $reason
     * @param float $startTime
     * @return void
     */
    private function logError(
        RequestInterface $request,
        $reason,
        float $startTime
    ): void {
        $duration = round((microtime(true) - $startTime) * 1000, 2);

        $message = sprintf(
            'HTTP Error: %s %s - %s (%s ms)',
            $request->getMethod(),
            $request->getUri(),
            $reason instanceof \Exception ? $reason->getMessage() : 'Unknown error',
            $duration
        );

        $context = [
            'method' => $request->getMethod(),
            'uri' => (string) $request->getUri(),
            'duration_ms' => $duration,
            'error' => $reason instanceof \Exception ? $reason->getMessage() : (string) $reason,
        ];

        if ($reason instanceof \Exception) {
            $context['exception'] = get_class($reason);
            $context['trace'] = $reason->getTraceAsString();
        }

        $this->logger->error($message, $context);
    }

    /**
     * Определить уровень логирования по HTTP статусу
     *
     * @param int $statusCode
     * @return string
     */
    private function getLogLevel(int $statusCode): string
    {
        if ($statusCode >= 500) {
            return LogLevel::ERROR;
        }

        if ($statusCode >= 400) {
            return LogLevel::WARNING;
        }

        return LogLevel::INFO;
    }

    /**
     * Очистить заголовки от конфиденциальных данных
     *
     * @param array $headers
     * @return array
     */
    private function sanitizeHeaders(array $headers): array
    {
        $sensitiveHeaders = ['authorization', 'x-api-key', 'cookie', 'set-cookie'];
        $sanitized = [];

        foreach ($headers as $name => $values) {
            $lowerName = strtolower($name);
            if (in_array($lowerName, $sensitiveHeaders, true)) {
                $sanitized[$name] = ['***REDACTED***'];
            } else {
                $sanitized[$name] = $values;
            }
        }

        return $sanitized;
    }

    /**
     * Очистить тело запроса/ответа от конфиденциальных данных
     *
     * @param string $body
     * @return string
     */
    private function sanitizeBody(string $body): string
    {
        // Пытаемся декодировать JSON
        $decoded = json_decode($body, true);
        
        if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
            // Скрываем конфиденциальные поля
            $sensitiveFields = ['client_secret', 'password', 'access_token', 'refresh_token'];
            
            foreach ($sensitiveFields as $field) {
                if (isset($decoded[$field])) {
                    $decoded[$field] = '***REDACTED***';
                }
            }
            
            return json_encode($decoded, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        }

        // Если не JSON, возвращаем как есть (но ограничиваем размер)
        if (strlen($body) > 10000) {
            return substr($body, 0, 10000) . '... (truncated)';
        }

        return $body;
    }
}
