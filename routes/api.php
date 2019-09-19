<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:api')->group(function () {


//    Route::get('like', 'Api\Interact\LikeController');
//    Route::get('rate', 'Api\Interact\RateController');

//    Route::apiResource('cart', 'Api\Money\CartController');

    Route::post('upload', 'UpLoadController');

});

Route::apiResource('item', 'Api\Item\ItemController')->middleware('auth:api')->except(['index', 'show']);
Route::apiResource('item', 'Api\Item\ItemController')->only(['index', 'show']);


Route::post('/buy/{id}', function (Request $request, $id) {


    $item = \App\Item::find($id);

    if (empty($item))
        return response()->json('cant find the item you looking for!', 404);

    $user = $item->user;

    $http = new GuzzleHttp\Client();

    $url = http_build_query([
        'recipient_id' => $user->bio->payment_id,
        'amount' => $item->budget,
        'details' => "for the $item->title you post at pop shop site",
        'Authorization' => $request->authorization,
    ]);

    $response = $http->post(config('pop.sites.c-pay.url ') . '/api/send' . $url, []);

    return response()->json($response->getBody());

    $data = json_decode((string)$response->getBody(), true);

    return response()->json($data);
});