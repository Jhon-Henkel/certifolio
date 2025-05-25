<?php

namespace App\Infra\Enum;

use App\Models\Certificate\Certificate;
use App\Models\User\User;

enum ModuleNameEnum: string
{
    case User = 'Usuário';
    case Certificate = 'Certificados';

    public static function getLabel(string $modelName): string
    {
        return match ($modelName) {
            User::class => self::User->value,
            Certificate::class => self::Certificate->value,
            default => 'Módulo desconhecido',
        };
    }
}
