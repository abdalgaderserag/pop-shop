<?php

namespace App\Http\Controllers\Api\Money;

use App\Http\Controllers\Controller;
use App\Item;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BuyController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        /*$http = new Client();

        $response = $http->post(config('pop.sites.c-pay.url') . '/transfer',
            [
                'headers' => [
                    'Authorization' => "Bearer " . Session::get('access_token'),
                    'Content-Type' => "*"
                ]
            ]);*/

//        $data = json_decode((string)$response->getBody(), true);
        $item = Item::where('id', \session('id'))->first();
        $item->stock = $item->stock + 1;
        $item->save();

    }
}
