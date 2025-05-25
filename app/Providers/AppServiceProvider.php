<?php

namespace App\Providers;

use App\Models\Certificate\Certificate;
use App\Modules\Certificate\Policy\CertificatePolicy;
use Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         Gate::policy(Certificate::class, CertificatePolicy::class);
    }
}
