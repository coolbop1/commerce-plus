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
    return view('temp');
});
Route::get('/testadmin', function () {
    return view('admin');
});
Route::get('/admin', 'AdminController@index');

Route::get('/superadmin', 'SuperAdminController@index');
Route::get('/register', function () {
    return view('register');
});
