<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class SMSFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'sms-service';
    }
}
