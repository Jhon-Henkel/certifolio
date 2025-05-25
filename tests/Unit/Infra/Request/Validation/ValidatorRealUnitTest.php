<?php

namespace Tests\Unit\Infra\Request\Validation;

use App\Infra\Request\Validation\Exceptions\InvalidArrayDataException;
use App\Infra\Request\Validation\Exceptions\InvalidRequestDataException;
use App\Infra\Request\Validation\ValidatorReal;
use Illuminate\Http\Request;
use PHPUnit\Framework\Attributes\TestDox;
use Tests\UnitTestCase;

class ValidatorRealUnitTest extends UnitTestCase
{
    #[TestDox("Testando com dados inválidos")]
    public function testValidateRequestTestOne()
    {
        $this->expectException(InvalidRequestDataException::class);
        $this->expectExceptionMessage("{\"Usuário\":[\"O Usuário é obrigatório!\"]}");

        $request = new Request();
        $request->merge(['userId' => '']);

        $horusValidator = new ValidatorReal();
        $horusValidator->validateRequest($request, ['userId' => 'required']);
    }

    #[TestDox("Testando com dados válidos")]
    public function testValidateRequestTestTwo()
    {
        $request = new Request();
        $request->merge(['name' => 'Horus']);

        $horusValidator = new ValidatorReal();
        $horusValidator->validateRequest($request, ['name' => 'required']);

        $this->assertTrue(true);
    }

    #[TestDox("Testando com dados inválidos")]
    public function testValidateArrayDataTestOne()
    {
        $this->expectException(InvalidArrayDataException::class);
        $this->expectExceptionMessage("{\"Usuário\":[\"O Usuário é obrigatório!\"]}");

        $array = ['userId' => ''];

        $horusValidator = new ValidatorReal();
        $horusValidator->validateArrayData($array, ['userId' => 'required']);
    }

    #[TestDox("Testando com dados válidos")]
    public function testValidateArrayDataTestTwo()
    {
        $array = ['name' => 'Horus'];

        $horusValidator = new ValidatorReal();
        $horusValidator->validateArrayData($array, ['name' => 'required']);

        $this->assertTrue(true);
    }
}
