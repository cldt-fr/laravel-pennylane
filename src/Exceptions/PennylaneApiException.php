<?php

namespace CLDT\PennylaneLaravel\Exceptions;

use Illuminate\Http\Client\Response;

/**
 * Base exception for all Pennylane API errors.
 *
 * Use the {@see fromResponse()} factory to build the appropriate subclass
 * based on the HTTP status code returned by the API.
 *
 * @see PennylaneBadRequestException  (400)
 * @see PennylaneAuthenticationException (401)
 * @see PennylaneAuthorizationException  (403)
 * @see PennylaneNotFoundException       (404)
 * @see PennylaneValidationException     (422)
 * @see PennylaneRateLimitException      (429)
 * @see PennylaneServerException         (5xx)
 */
class PennylaneApiException extends \RuntimeException
{
    protected int $statusCode;

    protected string $errorMessage;

    protected array $responseBody;

    protected Response $response;

    public function __construct(
        int $statusCode,
        string $errorMessage,
        array $responseBody,
        Response $response,
        ?\Throwable $previous = null,
    ) {
        $this->statusCode = $statusCode;
        $this->errorMessage = $errorMessage;
        $this->responseBody = $responseBody;
        $this->response = $response;

        parent::__construct("Pennylane API error [{$statusCode}]: {$errorMessage}", $statusCode, $previous);
    }

    /**
     * Build the appropriate exception subclass from an HTTP response.
     *
     * @throws static
     */
    public static function fromResponse(Response $response, ?\Throwable $previous = null): static
    {
        $statusCode = $response->status();
        $body = $response->json() ?? [];
        $message = $body['error'] ?? $body['message'] ?? $response->body();

        $exception = match (true) {
            $statusCode === 400 => PennylaneBadRequestException::fromResponseBody($statusCode, $message, $body, $response, $previous),
            $statusCode === 401 => new PennylaneAuthenticationException($statusCode, $message, $body, $response, $previous),
            $statusCode === 403 => new PennylaneAuthorizationException($statusCode, $message, $body, $response, $previous),
            $statusCode === 404 => new PennylaneNotFoundException($statusCode, $message, $body, $response, $previous),
            $statusCode === 422 => new PennylaneValidationException($statusCode, $message, $body, $response, $previous),
            $statusCode === 429 => new PennylaneRateLimitException($statusCode, $message, $body, $response, $previous),
            $statusCode >= 500 => new PennylaneServerException($statusCode, $message, $body, $response, $previous),
            default => new self($statusCode, $message, $body, $response, $previous),
        };

        return $exception;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function getErrorMessage(): string
    {
        return $this->errorMessage;
    }

    public function getResponseBody(): array
    {
        return $this->responseBody;
    }

    public function getResponse(): Response
    {
        return $this->response;
    }
}
