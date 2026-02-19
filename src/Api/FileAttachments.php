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

    public function upload(array $fields = [], array $attachments = []): FileAttachmentResponse
    {
        return FileAttachmentResponse::fromArray($this->httpPostMultipart('file_attachments', $fields, $attachments));
    }
}
