<?php

namespace CLDT\PennylaneLaravel\Api;

use CLDT\PennylaneLaravel\Dto\PaginatedResponse;
use CLDT\PennylaneLaravel\Dto\Responses\FileAttachmentResponse;

class LedgerAttachments extends BaseApi
{
    public function list(array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet('ledger_attachments', $params), FileAttachmentResponse::class);
    }

    public function upload(array $fields = [], array $attachments = []): FileAttachmentResponse
    {
        return FileAttachmentResponse::fromArray($this->httpPostMultipart('ledger_attachments', $fields, $attachments));
    }
}
