<?php

namespace App\Http\Controllers\Api\Money;

use App\Http\Controllers\Controller;
use App\Item;
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

        $response = $http->post(config('pop.sites.c-pay.url') . '/transfer',
            [
                'headers' => [
                    'Authorization' => "Bearer " . Session::get('access_token'),
                    'Content-Type' => "*"
                ]
            ]);

        $data = json_decode((string)$response->getBody(), true);


        $id = (int)$_GET['id'];

        $item = Item::all()->where('id', $id)->first();
        $item->stock = $item->stock - 1;
        $item->save();
    }
}
