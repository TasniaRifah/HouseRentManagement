<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Image;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('product-list');
        $products = Product::latest()->paginate(20);
 
        return view('backend.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $categories = Category::pluck('categories_name', 'id')->toArray();
        return view('backend.products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
    
        try {
       
            // Product::create([
            //     'title' => $request->title,
            //     'price' => $request->price,
            //     'discount' => $request->discount,
            //      'category_id' => $request->category,
            //      'description' => $request->description,
            //      'is_active' => $request->is_active ? true : false,
            //     //  'image' => $this->uploadImage($request->file('image'))
            // ]);
            $requestData = $request->all();
            $requestData['image'] = $this->uploadImage($request->file('image'));
            $product = Product::create($requestData);

            $product->categories()->attach($requestData['category_ids']);
             
             Session::flash('message', 'Created Successfully!');
             return redirect()->route('products.index');
         } catch (QueryException $e) {
 
             return Redirect::back()->withInput()->withErrors($e->getMessage());
         }
        return view('backend.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('backend.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::pluck('categories_name', 'id')->toArray();
        $selectedCategories = $product->categories->pluck('id')->toArray();
        // dd($product);
        return view('backend.products.edit', compact('categories', 'product', 'selectedCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        try {
            $requestData = $request->all();
            $requestData['image'] = $request->file('image') ? $this->uploadImage($request->file('image')) : $product->image;
            $requestData['is_active'] = $request->is_active ?? 0;
            $product->update($requestData);
            $product->categories()->sync($requestData['category_ids']);
            return redirect()->route('products.index')->withMessage('Successfully Updated');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->categories()->detach();
        $product->delete();
        return redirect()->route('products.index')->withMessage('Successfully Deleted');
    }


    public function uploadImage($file = null)
    {
        if (is_null($file)) return $file;

        $fileName = date('dmY') . time() . '.' . $file->getClientOriginalExtension();
        Image::make($file)
            ->resize(400, 500)
            ->save(storage_path('app/public/products/' . $fileName));
        return $fileName;
    }

    
    public function trash()
    {
    
        $products = Product::onlyTrashed()->paginate(2);
        return view('backend.products.trash', compact('products'));
    }
    public function restore($id)
    {
        try {
            $product = Product::onlyTrashed()->whereId($id)->firstOrFail();
            $product->restore();
            return redirect()->back()->withMessage('Successfully Restored !');
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $product = Product::onlyTrashed()->whereId($id)->firstOrFail();
            $product->forceDelete();
            return redirect()->route('products.index')->withMessage('Successfully Deleted');
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->back()->withErrors($e->getMessage());
        }
    }




}
