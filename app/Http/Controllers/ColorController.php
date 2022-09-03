<?php

namespace App\Http\Controllers;

use App\Http\Requests\ColorRequest;
use App\Models\Color;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ColorController extends Controller
{
    public function index()
    {

        $colors = Color::latest()->get();

        return view('backend.colors.index', compact('colors'));
    }
    public function store(ColorRequest $request)
    {
        try {
            Color::create([
                'colorsname' => $request->colorsname,
                'color_code' => $request->color_code,
                'is_active' => $request->is_active ? true : false,

            ]);
            Session::flash('message', 'Created Successfully!');
            return redirect()->route('colors.index');
        } catch (QueryException $e) {

            return Redirect::back()->withInput()->withErrors($e->getMessage());
        }
    }
    public function create()
    {

        return view('backend.colors.create');
    }
    public function show(Color $color)
    {
        // $color=Color::where('id','=',$id)->get();
        // $color = Color::findOrFail($id);

        return view('backend.colors.show', compact('color'));
    }
    public function edit(Color $color)
    {
        // $color = Color::findOrFail($id);
        // $color=Color::where('id','=',$id)->get();
        return view('backend.colors.edit', compact('color'));

    }
    public function update(ColorRequest $request, Color $color)
    {
        // $color = Color::findOrFail($id);
// if($color->colorsname==$request->colorsname&&$color->identify_code==$request->identify_code&&$color->is_active==$request->is_active){
//   Session::flash('massage','Data Already has taken');
//   return redirect()->route('color.edit');
// }
// else{
        try {
            $color->update([
                'colorsname' => $request->colorsname,
                'color_code' => $request->color_code,
                'is_active' => $request->is_active ? true : false,

            ]);

            Session::flash('message', 'Updated Successfully!');
            return redirect()->route('colors.index');

        } catch (QueryException $e) {

            return Redirect::back()->withInput()->withErrors($e->getMessage());
        }

    }

    public function destroy(Color $color)
    {
        //$color = Color::findOrFail($id);
        try {
            $color->delete();
            Session::flash('message', 'Deleted Successfully!');
            return redirect()->route('colors.index');
        } catch (QueryException $e) {

            return Redirect::back()->withErrors($e->getMessage());
        }
    }

}
