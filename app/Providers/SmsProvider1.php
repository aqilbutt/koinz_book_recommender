<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\SMSService1;

class SmsProvider1 extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('sms-service', function ($app) {
            return new SMSService1();
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
