<?php

namespace App\Http\Controllers;

use App\Exports\CourseExport;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CourseRequest;
use App\Models\Course;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Image;
use PDF;
use Excel;
use Illuminate\Support\Facades\Log;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::latest()->get();
       

        return view('backend.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
     
        try {
           Course::create([
                'title' => $request->title,
                'batch_no' => $request->batch_no,
                'class_start_date' => $request->class_start_date,
                'class_end_date' => $request->class_end_date,
               'instructor_name'=>$request->instructor_name,
                'baner' => $this->uploadImage($request->file('baner')),
                'is_active' => $request->is_active ? true : false,
                'course_type' => $request->course_type,
            ]);
            
            Session::flash('message', 'Created Successfully!');
            return redirect()->route('courses.index');
        } catch (QueryException $e) {

            return Redirect::back()->withInput()->withErrors($e->getMessage());
        }
    }
    public function show(Course $course)
    {
        
        return view('backend.courses.show', compact('course'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(course $course)
    {
        return view('backend.courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, course $course)
    {
       
        try {
            if ($request->file('baner')) {
                unlink(storage_path('app/public/courses/') . $course->baner);
            }
            $course->update([
                'title' => $request->title,
                'batch_no' => $request->batch_no,
                'class_start_date' => $request->class_start_date,
                'class_end_date' => $request->class_end_date,
               'instructor_name'=>$request->instructor_name,
                'baner' => $this->uploadImage($request->file('baner')),
                'is_active' => $request->is_active ? true : false,
                'course_type' => $request->course_type,
            ]);

            Session::flash('message', 'Updated Successfully!');
            return redirect()->route('courses.index');

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
    public function destroy(Course $course)
    {
       
        try {
            if ($course->image && file_exists(storage_path('app/public/courses/' . $course->image))) {
                unlink(storage_path('app/public/courses/' . $course->image));
            }
            $course->delete();
            Session::flash('message', 'Deleted Successfully!');
            return redirect()->route('courses.index');
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return Redirect::back()->withErrors($e->getMessage());
        }
    }
    public function uploadImage($file = null)
    {
        if (is_null($file)) return $file;

        $fileName = date('dmY') . time() . '.' . $file->getClientOriginalExtension();
        Image::make($file)
            ->resize(300, 200)
            ->save(storage_path('app/public/courses/' . $fileName));
        return $fileName;
    }

    public function trash()
    {
    
        $courses = Course::onlyTrashed()->paginate(2);
        return view('backend.courses.trash', compact('courses'));
    }
    public function restore($id)
    {
        try {
            $course = Course::onlyTrashed()->whereId($id)->firstOrFail();
            $course->restore();
            return redirect()->back()->withMessage('Successfully Restored !');
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $course = Course::onlyTrashed()->whereId($id)->firstOrFail();
            $course->forceDelete();
            return redirect()->route('courses.index')->withMessage('Successfully Deleted');
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
    public function downloadPdf()
    {
        $courses = course::all();
        $pdf = PDF::loadView('backend.courses.pdf', compact('courses'));
        return $pdf->download('categories.pdf');
    }

    public function downloadExcel()
    {
        return Excel::download(new CourseExport, 'courses.xlsx');
    }

}
