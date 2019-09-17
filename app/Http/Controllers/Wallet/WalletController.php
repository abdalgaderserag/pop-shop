<?php

namespace App\Http\Controllers\Wallet;

use App\Http\Controllers\Api\Money\BuyController;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class WalletController extends Controller
{


    public function redirect()
    {

        Session::put('back', url()->previous());

        if (Session::has('access_token'))
            return redirect()->back();
//            return redirect()->route('buy')->with('id', (int)$_GET['id']);

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

        Session::put('access_token', $data['access_token']);

        return redirect(Session::get('back'));
    }

    public function addPayment()
    {
        if (Session::has('access_token'))
            return redirect('');

        $query = http_build_query([
            'client_id' => config('pop.sites.c-pay.client_id') + 1,
            'redirect_uri' => url('/') . '/save/payment',
            'response_type' => 'code',
            'scope' => '',
        ]);

        return redirect('http://127.0.0.1:9000/oauth/authorize?' . $query);
    }

    public function savePayment(Request $request)
    {
//        todo:add the user_id from the other site
        $bio = Auth::user()->bio;
        $bio->payment_code = $request->code;
        $bio->save();
        return redirect('/profile');
    }
}
