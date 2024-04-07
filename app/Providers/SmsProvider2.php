<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\SMSService2;

class SmsProvider2 extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('sms-service', function ($app) {
            return new SMSService2();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
