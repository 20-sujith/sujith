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
    return view('user');
});
Route::get('/admin', function () {
    return view('index');
});
Route::get('/userform', function () {
    return view('form');
});
Route::get('/usertable', function () {
    return view('table');
});
Route::post('/login_action', 'App\Http\Controllers\logincontroller@login'); 
Route::get('/login_action', function () {
    return view('index');
});
Route::post('/form_action', 'App\Http\Controllers\logincontroller@form');
Route::get('/usertable', 'App\Http\Controllers\logincontroller@table'); 
Route::get('/editemp/{type}', 'App\Http\Controllers\LoginController@edit');
Route::post('/updateemp', 'App\Http\Controllers\logincontroller@update');
Route::get('/deleteemp/{type}', 'App\Http\Controllers\logincontroller@delete');
Route::get('/logout_action', 'App\Http\Controllers\logincontroller@logout');
?>
