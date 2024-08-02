<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductDetailController extends Controller
{
    public function index($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $userId = null;
        if (Auth::check() && Auth::user()) {
            $userId = Auth::user()->id;
        }

        return view("front.productDetail.index", compact('product', 'userId'));
    }
}
