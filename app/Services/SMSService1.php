<?php

namespace App\Services;

use App\Helper\SMSHelper\SMSHelper;

class SMSService1
{
    public function sendSms($recipient, $message)
    {
        $url = 'https://run.mocky.io/v3/8eb88272-d769-417c-8c5c-159bb023ec0a';
        $data = ['recipient' => $recipient, 'message' => $message];
        return SMSHelper::callApi($url, 'POST', $data); 
    }
}
