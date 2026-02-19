<?php

namespace CLDT\PennylaneLaravel\Api;

use CLDT\PennylaneLaravel\Dto\PaginatedResponse;
use CLDT\PennylaneLaravel\Dto\Responses\FileAttachmentResponse;

class FileAttachments extends BaseApi
{
    public function list(array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet('file_attachments', $params), FileAttachmentResponse::class);
    }

    public function upload(array $data): FileAttachmentResponse
    {
        return FileAttachmentResponse::fromArray($this->httpPost('file_attachments', $data));
    }
}
