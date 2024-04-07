<?php

namespace App\Helper\SMSHelper;

use Illuminate\Support\Facades\Http;

/**
 * Class responsible to handle methods related to 
 * sms send usecases
 */
class SMSHelper
{

    /**
     * Call the API and return the response.
     *
     * @param string $url URL of the API endpoint.
     * @param string $method HTTP method.
     * @param array $data parameters.
     * @return array The API response.
     */
    public static function callApi($url, $method = 'GET', $data = [])
    {
        $response = Http::send($method, $url, $data);
        if ($response->successful()) {
            return true;
        } else {
            return false;
        }
    }
}
