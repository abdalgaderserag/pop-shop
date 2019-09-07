<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Handle the incoming request.
     *
     * @throws
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
//        if (!Auth::check())
//            return response()->json('you are not authorized to peform this action', 403);

        list($type, $data) = explode(';', $request->result);
        list($code, $data) = explode(',', $data);
        list($file_type, $type) = explode(':', $type);
        list($file_type, $type) = explode('/', $type);

        if ($file_type == "image") {
            if ($code == "base64") {
                $data = base64_decode($data);
            }
            $path = 'storage/items/' . $file_type . '/' . Auth::id() . '/' . Factory::create()->uuid . '.' . $type;
            Storage::disk('public')->put($path, $data);
        } else
            return response()->json('unknown file type', 800);

        return response()->json(['path' => '/' . $path, 'type' => $file_type], 200);
    }
}
