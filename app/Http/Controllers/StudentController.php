<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\Student;
use Illuminate\Support\Facades\URL;

class StudentController extends Controller
{
    public function __construct($value='')
    {
        $this->middleware('auth')->except('store');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $students = Student::all();
        return view('backend.students.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::all();
        return view('backend.students.create',compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        $request->validate([
            "namee" => "required|min:5|max:191",
            "namem" => "required|min:5|max:191",
            "education" => "required|min:5|max:191",
            "city" => "required|min:3|max:191",
            "accepted_year" => "required|min:4|max:4",
            "address" => "required",
            "email" => "required|unique:students",
            "phone" => "required|min:12",
            "dob" => "required",
            "gender" => "required|min:4|max:6",
            "subjects" => "required",
            "p1" => "required|min:3|max:191",
            "p1_rs" => "required|min:3|max:191",
            "p1_phone" => "required|min:12",
            "p2" => "required|min:3|max:191",
            "p2_rs" => "required|min:3|max:191",
            "p2_phone" => "required|min:12",
            "because" => "required",
            "bid" => "required"
        ]);

        $student = new Student;
        $student->namee = request('namee');
        $student->namem = request('namem');
        $student->education = request('education');
        $student->city = request('city');
        $student->accepted_year = request('accepted_year');
        $student->address = request('address');
        $student->email = request('email');
        $student->phone = request('phone');
        $student->dob = request('dob');
        $student->gender = request('gender');
        $student->p1 = request('p1');
        $student->p1_phone = request('p1_phone');
        $student->p1_relationship = request('p1_rs');
        $student->p2 = request('p2');
        $student->p2_phone = request('p2_phone');
        $student->p2_relationship = request('p2_rs');
        $student->because = request('because');
        $student->batch_id = request('bid');
        
        $student->save();

        // Add student_subject
        $student->subjects()->attach(request('subjects'));

        // return
      if(app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName() == 'students.create'){
        return redirect()->route('students.index');
      }else{
        // return back with noti msg
        return back()->with('status', 'Register successfully!');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::findOrFail($id);
        return response()->json($student);
        // return view('backend.students.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        return view('backend.students.edit');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
