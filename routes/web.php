<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'FrontendController@main')->name('main');

Route::get('studentregister','FrontendController@studentRegister')->name('student.register');

Route::get('allcourses','FrontendController@allCourses')->name('allcourses');

Route::get('detailcourse/{id}','FrontendController@detailCourse')->name('detailcourse');

Route::group([
  // 'name' => 'backend.',
  'middleware' => 'auth',

  'prefix' => 'backend',
  // 'namespace' => 'Backend'
], function () {
  Route::get('dashboard', 'BackendController@dashboard');

  Route::resource('courses','CourseController'); 
  // 7 methods
      //  -> index (getting datas) -> get  (courses)
      //  -> show (detail view) -> get (courses/1)

      //  -> create (data insert form) -> get (courses/create)
      //  -> store (data store) -> post
      
      //  -> edit  (data edit form / old value ) -> get (courses/1/edit)
      // -> update (data update) -> put

      // -> destroy (data delete) -> delete
  Route::resource('degrees','DegreeController');
  Route::resource('subjects','SubjectController');

  Route::resource('batches','BatchController');
  Route::resource('trainers','TrainerController');
  Route::resource('mentors','MentorController');

  Route::resource('groups','GroupController');
});

Route::resource('students','StudentController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/testing','HomeController@testing');



Route::get('/addquizzes','BackendController@addquizzes')->middleware('role:Trainer');

Route::get('/grades','BackendController@grades')->middleware('role:Mentor');

// Group Create

Route::post('getBatchesByCourse','BatchController@getBatchesByCourse')->name('course.batches');
Route::post('/getstudentformembers','BackendController@getstudentformembers')->name('getstudentformembers');