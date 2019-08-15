<?php

namespace App\Http\Controllers\Api\Interact;

use App\Like;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $like = Like::where('item_id', $request->item_id)->where('user_id', Auth::id())->first();
        if (!empty($like)) {
            $like = new Like();
            $like->item_id = $request->item_id;
            $like->user_id = Auth::id();
            return response(1, 200);
        } else {
            try {
                $like->delete();
            } catch (\Exception $err) {
                return response()->json('', 404);
            }
            return response(0, 200);
        }
    }
}
