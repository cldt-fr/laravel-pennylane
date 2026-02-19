<?php

namespace CLDT\PennylaneLaravel\Api;

use GuzzleHttp\ClientInterface;

abstract class BaseApi
{
    protected ClientInterface $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    protected function httpGet(string $uri, array $query = []): array
    {
        $options = [];
        if (!empty($query)) {
            $options['query'] = $query;
        }
        $response = $this->client->request('GET', $uri, $options);
        return json_decode($response->getBody()->getContents(), true);
    }

    protected function httpPost(string $uri, array $data = []): array
    {
        $options = [];
        if (!empty($data)) {
            $options['json'] = $data;
        }
        $response = $this->client->request('POST', $uri, $options);
        return json_decode($response->getBody()->getContents(), true);
    }

    protected function httpPut(string $uri, array $data = []): array
    {
        $options = [];
        if (!empty($data)) {
            $options['json'] = $data;
        }
        $response = $this->client->request('PUT', $uri, $options);
        return json_decode($response->getBody()->getContents(), true);
    }

    protected function httpDelete(string $uri, array $data = []): void
    {
        $options = [];
        if (!empty($data)) {
            $options['json'] = $data;
        }
        $this->client->request('DELETE', $uri, $options);
    }
}
