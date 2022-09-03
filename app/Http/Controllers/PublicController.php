<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        return view('Front.index');
    }
    public function cart()
    {
        return view('Front.cart');
    }
    public function order()
    {
        return view('Front.order');
    }
    public function checkout()
    {
        return view('Front.checkout');
    }
    public function product()
    {
        return view('Front.product');
    }
    public function shop()
    {
        return view('Front.shop');
    }
    public function about()
    {
        return view('about');
    }
}
