<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use App\Models\user;
use auth;
use COM;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function booking(Product $product)
    {
        return view('frontend.booking',compact('product'));
    }
    public function checkoutAddress(Product $product)
    {
        $user = auth()->user();

        return view('frontend.checkoutAddress',compact('product', 'user'));
    }
    public function checkoutPayment(Product $product)
    {
        return view('frontend.checkoutPayment',compact('product'));
    }
    public function checkoutReview(Product $product)
    {
        return view('frontend.booking',compact('product'));
    }
}
