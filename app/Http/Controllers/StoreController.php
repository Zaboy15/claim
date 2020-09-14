<?php

namespace App\Http\Controllers;

use App\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function getCity(){
        $store = Store::select('city')
                ->orderBy('city', 'asc')
                ->groupBy('city')
                ->get();
        return response()->json([
            "status"  => 200,
            "success" => "Success",
            "data"    => $store
        ]);
    }

    public function getStore(Request $request)
    {
        $store = Store::select('name', 'city', 'province')
                ->where('city', $request->input('city'))
                ->orderBy('name', 'asc')
                ->get();
        return response()->json([
            "status"  => 200,
            "success" => "Success",
            "data"    => $store
        ]);
    }
}
