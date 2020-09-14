<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProduct(){
        $products = Products::select('name')
                ->orderBy('name', 'asc')
                ->get();
        return response()->json([
            "status"  => 200,
            "success" => "Success",
            "data"    => $products
        ]);
    }
}
