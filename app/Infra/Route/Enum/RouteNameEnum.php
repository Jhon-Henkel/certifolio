<?php

namespace App\Infra\Route\Enum;

enum RouteNameEnum: string
{
    case ApiAuthLogin = 'api.auth.login';

    case ApiCertificateCreate = 'api.certificate.create';
}
