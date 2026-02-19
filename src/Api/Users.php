<?php

namespace CLDT\PennylaneLaravel\Api;

use CLDT\PennylaneLaravel\Dto\Responses\UserResponse;

class Users extends BaseApi
{
    public function create(array $data): UserResponse
    {
        return UserResponse::fromArray($this->httpPost('users', $data));
    }

    public function find(array $params = []): UserResponse
    {
        return UserResponse::fromArray($this->httpGet('users/find', $params));
    }

    public function update(int $id, array $data): UserResponse
    {
        return UserResponse::fromArray($this->httpPut("users/{$id}", $data));
    }

    public function me(): UserResponse
    {
        return UserResponse::fromArray($this->httpGet('me'));
    }
}
