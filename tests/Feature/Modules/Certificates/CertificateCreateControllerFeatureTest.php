<?php

namespace Feature\Modules\Certificates;

use App\Infra\Response\Enum\StatusCodeEnum;
use App\Models\Certificate\Certificate;
use Tests\FeatureTestCase;

class CertificateCreateControllerFeatureTest extends FeatureTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        Certificate::where('user_id', $this->user->id)->delete();
    }

    protected function tearDown(): void
    {
        Certificate::where('user_id', $this->user->id)->delete();
        parent::tearDown();
    }

    public function testRoute()
    {
        $response = $this->postJson('api/v1/certificates', [
            'issue_date' => '2023-01-01',
            'name' => 'Certificate Name',
            'credential_code' => '123456',
            'credential_url' => 'https://google.com',
            'expiration_date' => '2024-01-01',
            'issuing_organization' => 'Organization Name',
        ], $this->makeHeaders());

        $response->assertStatus(StatusCodeEnum::HttpCreated->value);

        $this->assertDatabaseHas('certificates', [
            'user_id' => $this->user->id,
            'name' => 'Certificate Name',
            'credential_code' => '123456',
            'credential_url' => 'https://google.com',
            'expiration_date' => '2024-01-01',
            'issuing_organization' => 'Organization Name',
        ]);
    }
}
