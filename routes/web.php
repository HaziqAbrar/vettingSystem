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

Route::group(['middleware'=>['auth:sanctum','verified']], function()
{
    Route::get('/dashboard','App\Http\Controllers\RedirectController@index')->name('dashboard');
    
    //yai punyo
    Route::group(['middleware'=>['checkrole:lecturer']], function()
    {
        // Route::get('/home',function() {
        //     return view('dashboard1');
        // })->name('home');
    });
    //ammar punyo
    Route::group(['middleware'=>['checkrole:student']], function()
    {
        Route::get('/profile',function() {
            return view('/ammar/profile');
        })->name('profile');
    
    });
});


