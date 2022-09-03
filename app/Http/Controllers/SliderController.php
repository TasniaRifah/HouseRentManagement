<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::latest()->paginate(4);
        return view('backend.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('image');

        if (file_exists($image)) {
            //make unique name for image
            $fileName  = date('dmY') . time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('sliders')) {
                Storage::disk('public')->makeDirectory('sliders');
            }

            $categoryImage = Image::make($image)->resize(280, 280)->stream();

            Storage::disk('public')->put('sliders/' . $fileName, $categoryImage);
        }
        try {
            $slider = new Slider();
            $slider->title = $request->input('title');
            $slider->sub_title = $request->input('sub_title');
            $slider->content_position = $request->input('content_position');
            $slider->btn_text = $request->input('btn_text');
            $slider->btn_link = $request->input('btn_link');
            $slider->image_url = $this->uploadImage($request->file('image'));
            $slider->save();
            return redirect()->route('sliders.index')->withMessage('Successfully Created');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(Slider $slider)
    {
        
       return view('backend.sliders.show', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('backend.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        try { 
            $slider = Slider::find($id);
            $slider->title = $request->input('title');
            $slider->sub_title = $request->input('sub_title');
            $slider->content_position = $request->input('content_position');
            $slider->btn_text = $request->input('btn_text');
            $slider->btn_link = $request->input('btn_link');
            $slider->image_url = $this->uploadImage($request->file('image')) ?? $slider->image_url;
            $slider->save();
            return redirect()->route('sliders.index')->withMessage('Successfully Updated');
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

    // public function destroy($id)
    // {
    //     try {
    //         $slider = Slider::find($id);
    //         if ($slider->image_url && file_exists(storage_path('app/public/sliders/' . $slider->image_url))) {
    //             unlink(storage_path('app/public/sliders/' . $slider->image_url));
    //         }

    //         $slider->delete();
    //         return redirect()->route('sliders.index')->withMessage('Successfully Deleted');
    //     } catch (QueryException $e) {
    //         Log::error($e->getMessage());
    //         return redirect()->back()->withErrors($e->getMessage());
    //     }
    // }

    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->route('sliders.index')->withMessage('Successfully Deleted');
    }


    public function trash()
    {
        $sliders = Slider::onlyTrashed()->paginate(3);
        return view('backend.sliders.trash', compact('sliders'));
    }

    public function restore($id)
    {
        try {
            $slider = Slider::onlyTrashed()->whereId($id)->firstOrFail();
            $slider->restore();
            return redirect()->back()->withMessage('Successfully Restored !');
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $slider = Slider::onlyTrashed()->whereId($id)->firstOrFail();
            $slider->forceDelete();
            return redirect()->route('sliders.index')->withMessage('Successfully Deleted');
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function uploadImage($file = null)
    {
        if (is_null($file)) return $file;

        $fileName = date('dmY') . time() . '.' . $file->getClientOriginalExtension();
        Image::make($file)
            ->resize(300, 200)
            ->save(storage_path('app/public/sliders/' . $fileName));
        return $fileName;
    }
}
