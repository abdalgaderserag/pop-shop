<?php

namespace App\Http\Controllers\Wallet;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WalletController extends Controller
{


    public function redirect()
    {

        if (\Illuminate\Support\Facades\Session::has('access_token'))
            return redirect('');

        $query = http_build_query([
            'client_id' => config('pop.sites.c-pay.client_id'),
            'redirect_uri' => url('/') . '/callback',
            'response_type' => 'code',
            'scope' => '',
        ]);

        return redirect('http://127.0.0.1:9000/oauth/authorize?' . $query);
    }

    public function callback(Request $request)
    {
        $http = new Client();
        $response = $http->post(config('pop.sites.c-pay.url') . '/oauth/token',
            [
                'form_params' => [
                    'grant_type' => 'authorization_code',
                    'client_id' => config('pop.sites.c-pay.client_id'),
                    'client_secret' => config('pop.sites.c-pay.client_secret'),
                    'redirect_uri' => 'http://127.0.0.1:8000/callback',
                    'code' => $request->code
                ]
            ]);

        $data = json_decode((string)$response->getBody(), true);

        \Illuminate\Support\Facades\Session::put('access_token', $data['access_token']);

        return redirect('/');
    }

    public function getRequest()
    {
        $http = new Client();
        $response = $http->post(config('pop.sites.c-pay.url') . '/oauth/token',
            [
                'form_params' => [
                    'grant_type' => 'authorization_code',
                    'client_id' => 4,
                    'client_secret' => 'TliPFUIYq6Ot7w7KusGFQkjmYM2QXRQPA5sqhw7b',
                    'redirect_uri' => 'http://127.0.0.1:8000/callback',
                ]
            ]);

        $data = json_decode((string)$response->getBody(), true);
        return response()->json($data);
    }
}
