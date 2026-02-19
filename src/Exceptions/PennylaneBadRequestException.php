<?php

namespace CLDT\PennylaneLaravel\Exceptions;

use CLDT\PennylaneLaravel\Dto\Enums\BadRequestCode;
use Illuminate\Http\Client\Response;

/**
 * Thrown on HTTP 400 responses from the Pennylane API.
 *
 * Exposes the structured error fields returned by the API:
 * {@see getField()}, {@see getBadRequestCode()}, {@see getPayload()}.
 */
class PennylaneBadRequestException extends PennylaneApiException
{
    protected ?string $field;

    protected ?BadRequestCode $badRequestCode;

    protected ?string $payload;

    public function __construct(
        int $statusCode,
        string $errorMessage,
        array $responseBody,
        Response $response,
        ?string $field = null,
        ?BadRequestCode $badRequestCode = null,
        ?string $payload = null,
        ?\Throwable $previous = null,
    ) {
        $this->field = $field;
        $this->badRequestCode = $badRequestCode;
        $this->payload = $payload;

        parent::__construct($statusCode, $errorMessage, $responseBody, $response, $previous);
    }

    /**
     * Build a PennylaneBadRequestException from the decoded response body.
     */
    public static function fromResponseBody(
        int $statusCode,
        string $message,
        array $body,
        Response $response,
        ?\Throwable $previous = null,
    ): self {
        $field = $body['field'] ?? null;
        $payload = $body['payload'] ?? null;
        $badRequestCode = null;

        if (isset($body['code'])) {
            $badRequestCode = BadRequestCode::tryFrom($body['code']);
        }

        return new self($statusCode, $message, $body, $response, $field, $badRequestCode, $payload, $previous);
    }

    public function getField(): ?string
    {
        return $this->field;
    }

    public function getBadRequestCode(): ?BadRequestCode
    {
        return $this->badRequestCode;
    }

    public function getPayload(): ?string
    {
        return $this->payload;
    }
}
