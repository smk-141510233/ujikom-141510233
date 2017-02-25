<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('/gawai', 'pegawaiController');
Route::resource('/jabat', 'jabatanController');
Route::resource('/golong', 'golonganController');
Route::resource('/tunjang', 'tunjanganController');

Route::group(['middleware' => ['api'],'prefix' => 'api'], function () {
    Route::post('register', 'ApiController@register');
    Route::post('login', 'ApiController@login');
    Route::group(['middleware' => 'jwt-auth'], function () {
    	Route::post('get_user_details', 'ApiController@get_user_details');
    });
});

Route::resource('/kategori', 'kategoriController');
Route::resource('/lembur', 'lemburController');
Route::resource('/tp', 'tunjangpegawaiController');
Route::resource('/penggaji', 'penggajianController');