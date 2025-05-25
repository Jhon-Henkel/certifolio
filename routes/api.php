<?php

use App\Infra\Route\Enum\RouteNameEnum;
use App\Modules\Auth\Controller\Login\LoginController;
use App\Modules\Certificate\Controller\CertificateCreateController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('login', LoginController::class)->name(RouteNameEnum::ApiAuthLogin);
});

Route::prefix('v1')->middleware(['auth:sanctum'])->group(function () {
    Route::prefix('certificates')->group(function () {
        Route::post('', CertificateCreateController::class)->name(RouteNameEnum::ApiCertificateCreate);
    });
});
