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

Route::get('/chart', function () {
    return view('admin/chart');
});

Route::get('/reset', function () {
    return view('auth/passwords/reset');
});

Route::resource('pages','AttendenceController');

Route::resource('admin','UsersController');

Route::resource('user','AdminAttendenceController');

Route::resource('leaves','Leaveholidays');

Auth::routes();

Route::get('/home', 'HomeController@index');



//
Route::get('/leave', 'Leaveholiday@leave');
Route::get('/holiday', 'Leaveholiday@holiday');


