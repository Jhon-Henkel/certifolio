<?php

namespace App\Modules\Certificate\UseCase;

use App\Infra\UseCase\Create\ICreateUseCase;
use App\Models\Certificate\Certificate;

class CertificateCreateUseCase implements ICreateUseCase
{
    public function execute(array $data): array
    {
        return Certificate::create([
            'user_id' => auth()->user()->id,
            'issue_date' => $data['issue_date'],
            'name' => $data['name'],
            'credential_code' => $data['credential_code'],
            'created_at' => date('Y-m-d H:i:s'),
            'credential_url' => $data['credential_url'],
            'expiration_date' => $data['expiration_date'],
            'issuing_organization' => $data['issuing_organization'],
        ])->toArray();
    }
}
