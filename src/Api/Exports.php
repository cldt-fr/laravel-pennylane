<?php

namespace CLDT\PennylaneLaravel\Api;

use CLDT\PennylaneLaravel\Dto\Responses\ExportStatusResponse;

class Exports extends BaseApi
{
    public function createAnalyticalGeneralLedger(array $data): ExportStatusResponse
    {
        return ExportStatusResponse::fromArray($this->httpPost('exports/analytical_general_ledgers', $data));
    }

    public function getAnalyticalGeneralLedger(int $id): ExportStatusResponse
    {
        return ExportStatusResponse::fromArray($this->httpGet("exports/analytical_general_ledgers/{$id}"));
    }

    public function createFec(array $data): ExportStatusResponse
    {
        return ExportStatusResponse::fromArray($this->httpPost('exports/fecs', $data));
    }

    public function getFec(int $id): ExportStatusResponse
    {
        return ExportStatusResponse::fromArray($this->httpGet("exports/fecs/{$id}"));
    }
}
