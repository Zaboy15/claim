<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClaimController extends Controller
{
    public function index(Request $request)
    {
        $store = new StoreController;
        $city = $store->getCity();

        $products = new ProductController;
        $product = $products->getProduct();

        return view('index')
                ->with('cities', $city->original['data'])
                ->with('products', $product->original['data']);
        }
}
