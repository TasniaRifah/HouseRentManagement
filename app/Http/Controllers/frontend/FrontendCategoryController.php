<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendCategoryController extends Controller
{
    public function getCategory()
    {
        $categories = Category::latest()->get();
        return view('frontend.index', compact('categories'));
    }
    
}
