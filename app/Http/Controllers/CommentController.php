<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    
    public function store(Request $request, Product $product)
    {
        $product->comments()->create([
            'body' => $request->body,
            'commented_by' => auth()->user()->id
        ]);

        return redirect()->back();
    }
}
