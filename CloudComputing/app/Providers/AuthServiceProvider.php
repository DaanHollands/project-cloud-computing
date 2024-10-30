<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Providers\SoapUserProvider;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Auth::provider('soap_api', function ($app, $config) {
            return new SoapUserProvider();
        });
    }

    public function register(): void
    {

    }
}
