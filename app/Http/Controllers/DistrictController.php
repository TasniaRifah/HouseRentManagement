<?php

namespace App\Http\Controllers;

use App\Http\Requests\DistrictRequest;
use App\Models\District;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts = district::latest()->get();

        return view('backend.districts.index', compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.districts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DistrictRequest $request)
    {
        try {
            district ::create([
                 'title' => $request->title,
                 
             ]);
             
             Session::flash('message', 'Created Successfully!');
             return redirect()->route('districts.index');
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
    public function show(District $district)
    {
        return view('backend.districts.show', compact('district'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(District $district)
    {
        return view('backend.districts.edit', compact('district'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DistrictRequest $request,District $district)
    {
        try {
            $district->update([
                'title' => $request->title,
              
            ]);

            Session::flash('message', 'Updated Successfully!');
            return redirect()->route('districts.index');

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
    public function destroy(District $district)
    {
        try {
            $district->delete();
            Session::flash('message', 'Deleted Successfully!');
            return redirect()->route('districts.index');
        } catch (QueryException $e) {

            return Redirect::back()->withErrors($e->getMessage());
        }
    }
}
