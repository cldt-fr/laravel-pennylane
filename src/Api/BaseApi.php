<?php

namespace CLDT\PennylaneLaravel\Api;

use CLDT\PennylaneLaravel\Exceptions\PennylaneApiException;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Client\Response;

abstract class BaseApi
{
    protected PendingRequest $client;

    public function __construct(PendingRequest $client)
    {
        $this->client = $client;
    }

    /**
     * @throws PennylaneApiException
     */
    protected function httpGet(string $uri, array $query = []): array
    {
        return $this->execute(fn () => $this->client->get($uri, $query));
    }

    /**
     * @throws PennylaneApiException
     */
    protected function httpPost(string $uri, array $data = []): array
    {
        return $this->execute(fn () => $this->client->post($uri, $data));
    }

    /**
     * @throws PennylaneApiException
     */
    protected function httpPut(string $uri, array $data = []): array
    {
        return $this->execute(fn () => $this->client->put($uri, $data));
    }

    /**
     * @throws PennylaneApiException
     */
    protected function httpPostMultipart(string $uri, array $fields = [], array $attachments = []): array
    {
        foreach ($attachments as $attachment) {
            $this->client->attach(
                $attachment['name'],
                $attachment['contents'],
                $attachment['filename'] ?? null
            );
        }

        try {
            $response = $this->client->post($uri, $fields);
        } catch (RequestException $e) {
            $this->client->asJson();

            throw PennylaneApiException::fromResponse($e->response, $e);
        }

        $this->client->asJson();

        return $this->handleResponse($response);
    }

    /**
     * @throws PennylaneApiException
     */
    protected function httpDelete(string $uri, array $data = []): void
    {
        try {
            $response = $this->client->delete($uri, $data);
        } catch (RequestException $e) {
            throw PennylaneApiException::fromResponse($e->response, $e);
        }

        if (! $response->successful()) {
            throw PennylaneApiException::fromResponse($response);
        }
    }

    /**
     * Execute an HTTP request and convert any RequestException into a PennylaneApiException.
     *
     * @throws PennylaneApiException
     */
    private function execute(callable $request): array
    {
        try {
            $response = $request();
        } catch (RequestException $e) {
            throw PennylaneApiException::fromResponse($e->response, $e);
        }

        return $this->handleResponse($response);
    }

    /**
     * Validate an HTTP response and return its JSON body.
     *
     * Acts as a safety net when retry is configured without throw.
     *
     * @throws PennylaneApiException
     */
    protected function handleResponse(Response $response): array
    {
        if (! $response->successful()) {
            throw PennylaneApiException::fromResponse($response);
        }

        return $response->json() ?? [];
    }
}
