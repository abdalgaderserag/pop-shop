<?php

namespace App\Http\Controllers\Api\Money;

use App\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['carts'] = Cart::where('user_id', Auth::id())->get();
        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart = new Cart();
        $cart->user_id = Auth::id();
        $cart->item_id = $request->item_id;
        $cart->amount = $request->amount;
        $cart->save();
        return response()->json($cart, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        $item = $cart->item();
        $item->user;
        $cart->item = $item;
        return response()->json($cart, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        $cart->amount = $request->amount;
        $cart->save();
        return response()->json($cart->amount, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        try {
            $cart->delete();
        } catch (\Exception $err) {
            return response()->json('the item you won\'t to delete not found in your cart', 404);
        }
        return response()->json('', 200);
    }
}
