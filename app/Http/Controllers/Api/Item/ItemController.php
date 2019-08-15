<?php

namespace App\Http\Controllers\Api\Item;

use App\Category;
use App\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['items'] = Item::with('user', 'category')->withCount('likes')->orderBy('created_at', 'desc');

//        assign if the user like this
        $i = 0;
        if (Auth::check())
            foreach ($data['items'] as $item) {
                $data['items'][$i]['isLiked'] = DB::table('likes')
                    ->where('user_id', Auth::id())
                    ->where('item_id', $item->id)->count();
            }
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
        $item = new Item();
        $item->title = $request->title;
        $item->user_id = Auth::id();
        $item->details = $request->details;
        $item->budget = $request->budget;
        $item->cents = $request->cents;
        $item->images = $request->images;
        if ($request->filled('stock'))
            $item->stock = $request->stock;
        $item->save();
        $category = new Category();
        $category->item_id = $item->id;
        $category->base_type = $request->base_type;
        $category->seconder_type = $request->seconder_type;
        $category->location = $request->location;

        $category->exchangeable = $request->exchangeable;
        $category->used = $request->used;

        $category->save();
        $item->category = $category;
        $item->likes_count = 0;
        return response()->json($item, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //'user', 'category'
        $item->user;
        $item->category;
        $item->likes_count = DB::table('likes')->where('item_id', $item->id)->count();

        if (Auth::check())
            $item['isLiked'] = DB::table('likes')
                ->where('user_id', Auth::id())
                ->where('item_id', $item->id)->count();

        return response()->json($item, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Item $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $item[$request->type] = $request[$request->type];
        $item->save();

        return response()->json($item, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        try {
            $item->delete();
        } catch (\Exception $err) {
            return response()->json('the item you won\'t to delete not found', 404);
        }
        return response()->json('', 200);
    }
}
