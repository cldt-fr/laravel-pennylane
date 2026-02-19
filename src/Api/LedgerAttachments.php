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

    public function upload(array $data): FileAttachmentResponse
    {
        return FileAttachmentResponse::fromArray($this->httpPost('ledger_attachments', $data));
    }
}
