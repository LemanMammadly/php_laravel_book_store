<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        // $products = Product::all();
        $products = Product::paginate(2);
        return view("front.shopList.index",compact('products'));
    }
}
