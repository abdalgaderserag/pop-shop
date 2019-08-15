<?php

namespace App\Http\Controllers\Api\Interact;

use App\Rate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $like = Rate::where('user_id', $request->user_id)->where('owner_id', Auth::id())->first();
        if (!empty($like)) {
            $like = new Rate();
            $like->user_id = $request->user_id;
            $like->owner_id = Auth::id();
            $like->rate = $request->rate;
            $like->save();
            return response($like->rate, 200);
        } else {
            $like->rate = $request->rate;
            $like->save();
            return response($like->rate, 200);
        }
    }
}
