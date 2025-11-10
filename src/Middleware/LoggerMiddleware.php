<?php
/**
 * LoggerMiddleware - PSR-3 Logger для HTTP запросов
 * PHP version 7.4
 *
 * @category Class
 * @package  SergeR\MagintB2BPlatformSDK
 */

declare(strict_types=1);

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
        $headers = $this->sanitizeHeaders($request->getHeaders());
        $body = (string) $request->getBody();
        
        $message = sprintf(
            "HTTP Request: %s %s\nHeaders: %s",
            $request->getMethod(),
            $request->getUri(),
            json_encode($headers, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT)
        );

        // Добавляем тело запроса, если есть
        if ($body) {
            $sanitizedBody = $this->sanitizeBody($body);
            $message .= "\nBody: " . $sanitizedBody;
        }

        $this->logger->info($message);
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
        $headers = $response->getHeaders();
        $body = (string) $response->getBody();

        $message = sprintf(
            "HTTP Response: %s %s - %d %s (%s ms)\nHeaders: %s",
            $request->getMethod(),
            $request->getUri(),
            $response->getStatusCode(),
            $response->getReasonPhrase(),
            $duration,
            json_encode($headers, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT)
        );

        // Добавляем тело ответа
        if ($body) {
            $sanitizedBody = $this->sanitizeBody($body);
            $message .= "\nBody: " . $sanitizedBody;
        }

        // Выбираем уровень логирования в зависимости от статуса
        $level = $this->getLogLevel($response->getStatusCode());
        $this->logger->log($level, $message);
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
            "HTTP Error: %s %s - %s (%s ms)\nError: %s",
            $request->getMethod(),
            $request->getUri(),
            $reason instanceof \Exception ? $reason->getMessage() : 'Unknown error',
            $duration,
            $reason instanceof \Exception ? $reason->getMessage() : (string) $reason
        );

        if ($reason instanceof \Exception) {
            $message .= "\nException: " . get_class($reason);
            $message .= "\nTrace:\n" . $reason->getTraceAsString();
        }

        $this->logger->error($message);
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
                $sanitized[$name] = ['***DELETED SENSITIVE DATA***'];
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
