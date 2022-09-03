<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::latest()->paginate(5);
        return view('frontend.faqs.list', compact('faqs'));
    }

    public function frontendshow()
    {
        $faqs = Faq::latest()->paginate(5);
        return view('frontend.faqs.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $faq = new Faq();
            $faq->question = $request->input('question');
            $faq->answer = $request->input('answer');
            $faq->save();
            return redirect()->route('faqs.index')->withMessage('Successfully Created');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        return view('frontend.faqs.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            // $faq = Faq::find($faq->id);
            $faq = Faq::find($id);
            $faq->question = $request->input('question');
            $faq->answer = $request->input('answer');
            $faq->save();
            return redirect()->route('faqs.index')->withMessage('Successfully Created');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        

        try {
            $faq->delete();
            return redirect()->route('faqs.index')->withMessage('Successfully Deleted');
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->back()->withErrors($e->getMessage());
        }
    }


    // public function delete($id)
    // {
    //     try {
    //         $slider = Faq::onlyTrashed()->whereId($id)->firstOrFail();
    //         $slider->forceDelete();
    //         return redirect()->route('faqs.index')->withMessage('Successfully Deleted');
    //     } catch (QueryException $e) {
    //         Log::error($e->getMessage());
    //         return redirect()->back()->withErrors($e->getMessage());
    //     }
    // }
}
