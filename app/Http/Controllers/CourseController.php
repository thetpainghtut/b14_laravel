<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return view('backend.courses.index',compact('courses'));
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
    public function store(Request $request)
    {
        // dd($request); // (1) black screen

        // Validation // 2 
        $request->validate([
            "name" => 'required|min:5|max:191',
            "logo" => 'required|mimes:jpeg,jpg,png',
            "outlines" => 'required',
            "fees" => 'required',
            "during" => 'required|min:5|max:191',
            "duration" => 'required|min:5|max:191'
        ]);

        // Upload if exist // 3
        if ($request->hasfile('logo')) {
            $logo = $request->file('logo');
            $upload_dir = public_path().'/storage/course/';
            $name = time().'.'.$logo->getClientOriginalExtension();
            $logo->move($upload_dir,$name);
            $path = '/storage/course/'.$name;
        }

        // Store Data // 4
        $course = new Course;
        $course->name = request('name');
        $course->logo = $path;
        $course->outline = request('outlines');
        $course->fees = request('fees');
        $course->during = request('during');
        $course->duration = request('duration');

        $course->save(); // data insert ****

        // Return redirect // 5
        return redirect()->route('courses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $course = Course::find($id);

        $course = Course::findOrFail($id);
        
        return view('backend.courses.show',compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);
        return view('backend.courses.edit',compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request); // (1) black screen

        // Validation // 2 
        $request->validate([
            "name" => 'required|min:5|max:191',
            "logo" => 'sometimes|mimes:jpeg,jpg,png',
            "outlines" => 'required',
            "fees" => 'required',
            "during" => 'required|min:5|max:191',
            "duration" => 'required|min:5|max:191'
        ]);

        // Upload if exist // 3
        if ($request->hasfile('logo')) {
            $logo = $request->file('logo');
            $upload_dir = public_path().'/storage/course/';
            $name = time().'.'.$logo->getClientOriginalExtension();
            $logo->move($upload_dir,$name);
            $path = '/storage/course/'.$name;
        }else{
            $path = request('oldlogo');
        }

        // Update Data // 4
        $course = Course::find($id);
        $course->name = request('name');
        $course->logo = $path;
        $course->outline = request('outlines');
        $course->fees = request('fees');
        $course->during = request('during');
        $course->duration = request('duration');

        $course->save(); // data insert ****

        // Return redirect // 5
        return redirect()->route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();

        // Return redirect // 5
        return redirect()->route('courses.index');
    }
}
