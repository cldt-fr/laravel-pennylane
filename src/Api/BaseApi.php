<?php

namespace CLDT\PennylaneLaravel\Api;

use Illuminate\Http\Client\PendingRequest;

abstract class BaseApi
{
    protected PendingRequest $client;

    public function __construct(PendingRequest $client)
    {
        $this->client = $client;
    }

    protected function httpGet(string $uri, array $query = []): array
    {
        return $this->client->get($uri, $query)->json();
    }

    protected function httpPost(string $uri, array $data = []): array
    {
        return $this->client->post($uri, $data)->json();
    }

    protected function httpPut(string $uri, array $data = []): array
    {
        return $this->client->put($uri, $data)->json();
    }

    protected function httpPostMultipart(string $uri, array $fields = [], array $attachments = []): array
    {
        foreach ($attachments as $attachment) {
            $this->client->attach(
                $attachment['name'],
                $attachment['contents'],
                $attachment['filename'] ?? null
            );
        }

        $response = $this->client->post($uri, $fields)->json();

        $this->client->asJson();

        return $response;
    }

    protected function httpDelete(string $uri, array $data = []): void
    {
        $this->client->delete($uri, $data);
    }
}
