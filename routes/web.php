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
    return redirect(route('login'));
});
Auth::routes();

// Student Routes
Route::group(['middleware' => 'auth'], function () {
	Route::get('/home', 'HomeController@index')->name('home');
	Route::post('/home', 'HomeController@issueDeposit')->name('home');
	Route::get('/student/index', 'StudentController@index')->name('student');
	Route::get('/book/index', 'BookController@index')->name('book');
	Route::get('/student/results/', 'StudentController@show')->name('student.show');
	Route::get('/book/results/', 'BookController@show')->name('book.show');
});
// Admin Rotes
Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function(){
   //Student routes 
		// index
		Route::get('/admin/student/add', 'StudentController@create')->name('student.add');
		// save
		Route::post('/admin/student/add', 'StudentController@store')->name('student.add');
		// Edit
		Route::get('/admin/student/{stud_id}/edit/', 'StudentController@edit')->name('student.edit');
		Route::post('/admin/student/{stud_id}/edit/', 'StudentController@update')->name('student.update');
		// Delete
		Route::get('/admin/student/{stud_id}/delete/', 'StudentController@destroy')->name('student.delete');
	// Book routes
		// index
		Route::get('/admin/book/add', 'BookController@create')->name('book.add');
		// save
		Route::post('/admin/book/add', 'BookController@store')->name('book.add');
		// Edit
		Route::get('/admin/book/{id}/edit/', 'BookController@edit')->name('book.edit');
		Route::post('/admin/book/{id}/edit/', 'BookController@update')->name('book.update');
		// Delete
		Route::get('/admin/book/{id}/delete/', 'BookController@destroy')->name('book.delete');
	// Report
		Route::get('admin/report/','ReportController@index')->name('report');
});