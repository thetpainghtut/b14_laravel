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

Route::get('/', function () {
    return view('welcome');
});

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

Route::resource('batches','BatchController');

Route::resource('students','StudentController');



