<?php

namespace App\Http\Controllers\Api\Money;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class BuyController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        if (!Session::has('access_token'))
            return redirect('/redirect');

        $http = new Client();

        $response = $http->post('http://127.0.0.1:9000/oauth/token',
            [
                'form_params' => [
                ],
//                todo: add the headers
                'headers' => [

                ]
            ]);

        $data = json_decode((string)$response->getBody(), true);
    }
}