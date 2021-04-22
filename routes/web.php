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
    return view('auth.login');
});

Auth::routes();
Route::match(["GET", "POST"], "/register", function () {
    return redirect("/login");
})->name("register");

Route::get('/home', 'HomeController@index')->name('home');

Route::resource("users", "UserController");
Route::get('/json/users', 'UserController@userJson')->name("json.user");

Route::resource("guru", "GuruController");
Route::get('/json/guru', 'GuruController@guruJson')->name("json.guru");

Route::resource("kriteria", "KriteriaController");
Route::get('/json/kriteria', 'KriteriaController@kriteriaJson')->name("json.kriteria");

Route::get("penilaian","HomeController@penilaian")->name("penilaian");

Route::resource("subkriteria", "SubkriteriaController");
Route::get('/json/subkriteria', 'SubkriteriaController@subkriteriaJson')->name("json.subkriteria");

Route::resource("penilaian", "PenilaianController");
Route::get('/json/penilaian', 'PenilaianController@penilaianJson')->name("json.penilaian");
