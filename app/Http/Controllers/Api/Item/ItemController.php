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
//        get the page number
        if (isset($_GET['page'])) {
            $page = (int)$_GET['page'];
        } else {
            $page = 1;
        }

        $perPage = config('pop.perPage');

//        get the item with at lest one in stock
        $items = Item::with('user', 'category')
            ->withCount('likes')
            ->orderBy('created_at', 'desc');

//        number of pages available
        $data['pages'] = $items->count() / $perPage;
//        paginate the items
        $data['items'] = $items->forPage($page, $perPage)->get();

//        assign if the authinticatied user like the item
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
        $item = new Item($request->only(['title', 'details', 'budget', 'cents', 'images']));
        $item->user_id = 1;
        if (!$request->unlimited) {
            if ($request->stock == null)
                $item->stock = 1;
        }
        $item->save();

        try {
            $category = new Category($request->only(['seconder_type', 'location', 'exchangeable', 'used']));

            if ($request->unlimited)
                $category->unlimited = true;

            if (empty($request->base_type))
                $category->base_type = 'other';
            else
                $category->base_type = $request->base_type;

            $category->item_id = $item->id;

            $category->save();
        } catch (\Exception $e) {
            $item->delete();
        }

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
