<?php

namespace App\Http\Controllers\Walte;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WalletController extends Controller
{


    public function redirect()
    {

        if (\Illuminate\Support\Facades\Session::has('access_token'))
            return redirect()->back();

        $query = http_build_query([
            'client_id' => 4,
            'redirect_uri' => 'http://127.0.0.1:8000/callback',
            'response_type' => 'code',
            'scope' => '',
        ]);

        return redirect('http://127.0.0.1:9000/oauth/authorize?' . $query);
    }

    public function callback(Request $request)
    {
        $http = new Client();
        $response = $http->post('http://127.0.0.1:9000/oauth/token',
            [
                'form_params' => [
                    'grant_type' => 'authorization_code',
                    'client_id' => 4,
                    'client_secret' => 'TliPFUIYq6Ot7w7KusGFQkjmYM2QXRQPA5sqhw7b',
                    'redirect_uri' => 'http://127.0.0.1:8000/callback',
                    'code' => $request->code
                ]
            ]);

        $data = json_decode((string)$response->getBody(), true);

        \Illuminate\Support\Facades\Session::put('access_token', $data['access_token']);

        return redirect('/');
    }
}
