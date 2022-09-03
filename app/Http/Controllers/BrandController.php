<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response*/
    public function index()
    {
        $brands = Brand::latest()->get();

        return view('backend.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        try {
            brand ::create([
                 'title' => $request->title,
                 
             ]);
             
             Session::flash('message', 'Created Successfully!');
             return redirect()->route('brands.index');
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
    public function show(Brand $brand)
    {
        return view('backend.brands.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('backend.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request,Brand $brand)
    {
        try {
            $brand->update([
                'title' => $request->title,
              
            ]);

            Session::flash('message', 'Updated Successfully!');
            return redirect()->route('brands.index');

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
    public function destroy(brand $brand)
    {
        try {
            $brand->delete();
            Session::flash('message', 'Deleted Successfully!');
            return redirect()->route('brands.index');
        } catch (QueryException $e) {

            return Redirect::back()->withErrors($e->getMessage());
        }
    }
}
