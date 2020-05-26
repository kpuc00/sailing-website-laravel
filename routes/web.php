<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// // Course routes
// Route::get('course', 'CoursesController@index');
// Route::get('course/create', 'CoursesController@create');
// Route::post('course', 'CoursesController@store');
// Route::get('course/{course}/edit', 'CoursesController@edit');
// Route::patch('course/{course}', 'CoursesControler@update');
// Route::delete('course/{course}', 'CoursesController@destroy');

//The above routes can be replaced with this because we followed the naming convention of laravel
Route::resource('course', 'CoursesController');

// Coach routes
Route::resource('coach', 'CoachesController');

// Competitor routes
Route::resource('competitor', 'CompetitorsController');

// Regatta routes
Route::resource('regatta', 'RegattasController');
