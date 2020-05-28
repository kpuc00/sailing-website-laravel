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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', "HomeController@index")->name('home'); // This redirect to the home page as default

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// // Course routes
// Route::resource('course', 'CoursesController');

Route::get('course', 'CoursesController@index');
Route::get('course/create', 'CoursesController@create')->middleware('checkAdmin'); // User must be admin to access this
Route::post('course', 'CoursesController@store');
Route::get('course/{course}', 'CoursesController@show');
Route::get('course/{course}/edit', 'CoursesController@edit')->middleware('checkAdmin'); // User must be admin to access this
Route::patch('course/{course}', 'CoursesControler@update')->middleware('checkAdmin'); // User must be admin to access this
Route::delete('course/{course}', 'CoursesController@destroy')->middleware('checkAdmin'); // User must be admin to access this


// // Coach routes
// Route::resource('coach', 'CoachesController');

Route::get('coach', 'CoachesController@index');
Route::get('coach/create', 'CoachesController@create')->middleware('checkAdmin'); // User must be admin to access this
Route::post('course', 'CoachesController@store');
Route::get('coach/{coach}', 'CoachesController@show');
Route::get('coach/{coach}/edit', 'CoachesController@edit')->middleware('checkAdmin'); // User must be admin to access this
Route::patch('coach/{coach}', 'CoachesController@update')->middleware('checkAdmin'); // User must be admin to access this
Route::delete('coach/{coach}', 'CoachesController@destroy')->middleware('checkAdmin'); // User must be admin to access this

// Competitor routes
Route::resource('competitor', 'CompetitorsController');

// Regatta routes
Route::resource('regatta', 'RegattasController');

// // Article routes
// Route::resource('article', 'ArticlesController')->middleware('checkAuthour');

Route::get('article', 'ArticlesController@index');
Route::get('article/create', 'ArticlesController@create')->middleware('checkAuthour'); // User must be the author to access this
Route::post('article', 'ArticlesController@store');
Route::get('article/{article}', 'ArticlesController@show');
Route::get('article/{article}/edit', 'ArticlesController@edit')->middleware('checkAuthour'); // User must be the author to access this
Route::patch('article/{article}', 'ArticlesController@update')->middleware('checkAuthour'); // User must be the author to access this
Route::delete('article/{article}', 'ArticlesController@destroy')->middleware('checkAuthour'); // User must be the author to access this

