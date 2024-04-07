<?php

namespace App\Services;

use App\Helper\SMSHelper\SMSHelper;

class SMSService2
{
    public function sendSms($recipient, $message)
    {
        $url = 'https://run.mocky.io/v3/268d1ff4-f710-4aad-b455-a401966af719';
        return SMSHelper::callApi($url, 'GET');
    }
}
