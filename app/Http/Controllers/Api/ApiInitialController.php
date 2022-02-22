<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ApiInitialController extends Controller
{
    public function getNoKey($link)
    {
        $client = new Client(['http_errors' => false]);

        $response = $client->request(
            'GET',
            $link
        );

        return $response;
    }

    public function postNoKey($params)
    {
        $client = new Client(['http_errors' => false]);

        $response = $client->request(
            $params['type'],
            $params['link'],
            [
                'form_params' => $params['data']
            ]
        );
        return $response;
    }

    public function postNoKeyFile($params)
    {
        $client = new Client(['http_errors' => false]);

        $response = $client->request(
            $params['type'],
            $params['link'],
            [
                'multipart' => $params['data']
            ]
        );
        return $response;
    }

}
