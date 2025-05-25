<?php

namespace App\Modules\Certificate\Policy;

use App\Infra\Policy\IPolicy;
use App\Models\User\User;

class CertificatePolicy implements IPolicy
{
    public function create(User $user): bool
    {
        return true;
    }

    public function list(User $user): bool
    {
        return true;
    }

    public function get(User $user): bool
    {
        return true;
    }

    public function update(User $user): bool
    {
        return true;
    }

    public function delete(User $user): bool
    {
        return true;
    }
}
