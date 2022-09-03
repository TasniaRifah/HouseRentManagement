<?php

namespace App\Http\Controllers;

use App\Exports\CategoriesExport;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

use PDF;
use Excel;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function index()
    {
        $categories = Category::latest()->get();
     

        return view('backend.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        
        try {
           Category::create([
                'categories_name' => $request->categories_name,
          
                'is_active' => $request->is_active ? true : false,
         
            ]);
            
            Session::flash('message', 'Created Successfully!');
            return redirect()->route('categories.index');
        } catch (QueryException $e) {

            return Redirect::back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        // dd($category->products);
        return view('backend.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('backend.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
       
        try {
            if ($request->file('image')) {
                unlink(storage_path('app/public/categories/') . $category->image);
            }
            $category->update([
                'categories_name' => $request->categories_name,
               
                'is_active' => $request->is_active ? true : false,
            ]);

            Session::flash('message', 'Updated Successfully!');
            return redirect()->route('categories.index');

        } catch (QueryException $e) {

            return Redirect::back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {

       $this->authorize('category-delete',$category);
        try {
            if ($category->image && file_exists(storage_path('app/public/categories/' . $category->image))) {
                unlink(storage_path('app/public/categories/' . $category->image));
            }
            $category->delete();
            Session::flash('message', 'Deleted Successfully!');
            return redirect()->route('categories.index');
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return Redirect::back()->withErrors($e->getMessage());
        }
    }

   

    // public function delete($id)
    // {
    //     try {
    //         $category = Category::onlyTrashed()->whereId($id)->firstOrFail();
    //         $category->forceDelete();
    //         return redirect()->route('categories.index')->withMessage('Successfully Deleted');
    //     } catch (QueryException $e) {
    //         Log::error($e->getMessage());
    //         return redirect()->back()->withErrors($e->getMessage());
    //     }
    // }

    public function trash()
    {
    
        $categories = Category::onlyTrashed()->paginate(2);
        return view('backend.categories.trash', compact('categories'));
    }
    public function restore($id)
    {
        try {
            $category = Category::onlyTrashed()->whereId($id)->firstOrFail();
            $category->restore();
            return redirect()->back()->withMessage('Successfully Restored !');
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $category = Category::onlyTrashed()->whereId($id)->firstOrFail();
            $category->forceDelete();
            return redirect()->route('categories.index')->withMessage('Successfully Deleted');
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
    public function downloadPdf()
    {
        $categories = Category::all();
        $pdf = PDF::loadView('backend.categories.pdf', compact('categories'));
        return $pdf->download('categories.pdf');
    }

    public function downloadExcel()
    {
        return Excel::download(new CategoriesExport, 'categories.xlsx');
    }
    public function productlist(Category $category)
    {
        //  $products=$category->products;
        return view('backend.products.list', compact('category'));
    }
   

}
