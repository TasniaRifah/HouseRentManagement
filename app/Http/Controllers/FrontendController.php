<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use App\Models\user;
use COM;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
     
    //    $categories=Category::active()->get();
        $products = Product::latest()->where('is_active',true)->get();
        $sliders = Slider::orderBy('content_position', 'asc')->get();
        return view('frontend.index',compact(['products', 'sliders']));
    }
    

    // public function category()
    // {
    //     $categories = Category::latest()->get();
    

    //     return view('frontend.index ', compact('categories'));
    // }
    public function productDetails(Product $product)
    {
    $categories=Category::active()->get();   
    return view('frontend.productdetail',compact('product','categories'));
    }
    public function categoryWiseProducts(Category $category)
    {
        $products = $category->products()->paginate(12);
        return view('frontend.category_wise_products', compact('category', 'products'));
    }

}
