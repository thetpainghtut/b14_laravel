<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;

class FrontendController extends Controller
{
  public function main($value='')
  {
    return view('frontend.main');
  }
  
  public function studentRegister($value='')
  {
    $subjects = Subject::all();
    return view('frontend.student_register',compact('subjects'));
  }

  public function allCourses($value='')
  {
    return view('frontend.allcourses');
  }

  public function detailCourse($id)
  {
    return view('frontend.detailcourse');
  }
}
