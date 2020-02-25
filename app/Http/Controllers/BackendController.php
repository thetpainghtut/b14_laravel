<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Illuminate\Database\Eloquent\Builder;

class BackendController extends Controller
{
  public function dashboard($value='')
  {
    return view('backend.dashboard');
  }

  public function addquizzes($value='')
  {
    return view('backend.quizzes');
  }

  public function grades($value='')
  {
    return view('backend.grades');
  }

  public function getstudentformembers(Request $request)
  {
    $bid = request('bid');
    // $students = Student::where('batch_id',$bid)->get();

    $students = Student::whereDoesntHave('groups', function (Builder $query) use ($bid) {
      $query->where('batch_id', $bid);
    })->get();

    return $students;
  }
}
