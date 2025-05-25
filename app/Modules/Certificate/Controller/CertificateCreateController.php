<?php

namespace App\Modules\Certificate\Controller;

use App\Infra\Controller\Create\BaseCreateController;
use App\Infra\UseCase\Create\ICreateUseCase;
use App\Models\Certificate\Certificate;
use App\Modules\Certificate\UseCase\CertificateCreateUseCase;

class CertificateCreateController extends BaseCreateController
{
    public function __construct(private CertificateCreateUseCase $useCase)
    {
    }

    protected function getUseCase(): ICreateUseCase
    {
        return $this->useCase;
    }

    protected function getRules(): array
    {
        return [
            'issue_date' => 'required|date',
            'name' => 'required|string|max:255',
            'credential_code' => 'required|string|max:255',
            'credential_url' => 'nullable|url|max:255',
            'expiration_date' => 'nullable|date',
            'issuing_organization' => 'required|string|max:255',
            'workload' => 'required|numeric',
        ];
    }

    protected function getModelName(): string
    {
        return Certificate::class;
    }
}
