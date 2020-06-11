<?php

use App\Http\Controllers\UsersController;
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

// // User routes
// Route::resource('user', 'CoursesController');

Route::get('user', 'UsersController@index')->middleware('checkAdmin'); // User must be admin to access this
// Route::get('user/create', 'UsersController@create')->middleware('checkAdmin'); // User must be itself to access this
Route::post('user', 'UsersController@store');
Route::get('user/{user}', 'UsersController@show')->middleware('checkItself');
Route::get('user/{user}/edit', 'UsersController@edit')->middleware('checkItself'); // User must be itself to access this
Route::patch('user/{user}', 'UsersController@update')->middleware('checkItself'); // User must be itself to access this
Route::patch('user/{user}/changeRole', 'UsersController@changeRole')->middleware('checkAdmin'); // User must be admin to access this
Route::delete('user/{user}', 'UsersController@destroy')->middleware('checkItself'); // User must be itself to access this

// // Course routes
// Route::resource('course', 'CoursesController');

Route::get('course', 'CoursesController@index');
Route::get('course/create', 'CoursesController@create')->middleware('checkAdmin'); // User must be admin to access this
Route::post('course', 'CoursesController@store');
Route::get('course/{course}', 'CoursesController@show');
Route::get('course/{course}/edit', 'CoursesController@edit')->middleware('checkAdmin'); // User must be admin to access this
Route::patch('course/{course}', 'CoursesController@update')->middleware('checkAdmin'); // User must be admin to access this
Route::delete('course/{course}', 'CoursesController@destroy')->middleware('checkAdmin'); // User must be admin to access this


// // Coach routes
// Route::resource('coach', 'CoachesController');

Route::get('coach', 'CoachesController@index');
Route::get('coach/create', 'CoachesController@create')->middleware('checkAdmin'); // User must be admin to access this
Route::post('coach', 'CoachesController@store');
Route::get('coach/{coach}', 'CoachesController@show');
Route::get('coach/{coach}/edit', 'CoachesController@edit')->middleware('checkAdmin'); // User must be admin to access this
Route::patch('coach/{coach}', 'CoachesController@update')->middleware('checkAdmin'); // User must be admin to access this
Route::delete('coach/{coach}', 'CoachesController@destroy')->middleware('checkAdmin'); // User must be admin to access this

// // Competitor routes
// Route::resource('competitor', 'CompetitorsController')->middleware('auth');

Route::get('competitor', 'CompetitorsController@index');
Route::get('competitor/create', 'CompetitorsController@create')->middleware('auth'); // User must be logged in to access this
Route::post('competitor', 'CompetitorsController@store');
Route::get('competitor/{competitor}', 'CompetitorsController@show');
Route::get('competitor/{competitor}/edit', 'CompetitorsController@edit')->middleware('auth'); // User must be logged in to access this
Route::patch('competitor/{competitor}', 'CompetitorsController@update')->middleware('auth'); // User must be logged in to access this
Route::delete('competitor/{competitor}', 'CompetitorsController@destroy')->middleware('auth'); // User must be logged in to access this

// // Regatta routes
//Route::resource('regatta', 'RegattasController');

Route::get('regatta', 'RegattasController@index');
Route::get('regatta/create', 'RegattasController@create')->middleware('checkAdmin'); // User must be admin to access this
Route::post('regatta', 'RegattasController@store');
Route::get('regatta/{regatta}', 'RegattasController@show');
Route::get('regatta/{regatta}/edit', 'RegattasController@edit')->middleware('checkAdmin'); // User must be admin to access this
Route::patch('regatta/{regatta}', 'RegattasController@update')->middleware('checkAdmin'); // User must be admin to access this
Route::delete('regatta/{regatta}', 'RegattasController@destroy')->middleware('checkAdmin'); // User must be admin to access this



// // Article routes
// Route::resource('article', 'ArticlesController')->middleware('checkAuthour');

Route::get('article', 'ArticlesController@index');
Route::get('article/create', 'ArticlesController@create')->middleware('checkAuthour'); // User must be the author to access this
Route::post('article', 'ArticlesController@store');
Route::get('article/{article}', 'ArticlesController@show');
Route::get('article/{article}/edit', 'ArticlesController@edit')->middleware('checkAuthour'); // User must be the author to access this
Route::patch('article/{article}', 'ArticlesController@update')->middleware('checkAuthour'); // User must be the author to access this
Route::delete('article/{article}', 'ArticlesController@destroy')->middleware('checkAuthour'); // User must be the author to access this


// // Announcement routes

Route::get('announcement', 'AnnouncementController@index');
Route::get('announcement/create', 'AnnouncementController@create');
Route::post('announcement', 'AnnouncementController@store');
Route::get('announcement/{announcement}', 'AnnouncementController@show');
Route::get('announcement/{announcement}/edit', 'AnnouncementController@edit');
Route::patch('/announcement/{announcement}', 'AnnouncementController@update');
Route::delete('/announcement/{announcement}', 'AnnouncementController@destroy');

// // Edit log routes

Route::get('editlog', 'EditLogsController@index');
