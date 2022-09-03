<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendProductController extends Controller
{
    public function productDetails(Product $product)
    {
        dd($product);
        // return view('frontend.detail');
    }
}
