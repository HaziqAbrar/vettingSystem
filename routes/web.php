<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoordinatorController;
use App\Http\Controllers\PanelController;

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


    //Coordinators
    Route::group(['middleware'=>['checkrole:coordinator']], function()
    {
      Route::get('/profileCoordinator',function() {
          return view('/coordinator/profileCoordinator');
      })->name('profile');


      // Route::get('/coordinator', [CoordinatorController::class, 'index']);
      // Route::get('/coordinator/alltitle', [CoordinatorController::class, 'alltitle']);
      // Route::get('/titleinfos/{titleinfo}', 'coordinatorController@show');
      // Route::post('/titleinfos/{titleinfo}', 'coordinatorController@show');
      // Route::patch('/titleinfos/{titleinfo}', 'coordinatorController@update');
      // Route::put('/coordinatoraccept/{titleinfo}', 'coordinatorController@acceptbtn');
      // Route::put('/coordinatorreject/{titleinfo}', 'coordinatorController@rejectbtn');
    });

    // Supervisors
    Route::group(['middleware'=>['checkrole:supervisor']], function()
    {
      Route::get('/profileSupervisor',function() {
          return view('/supervisor/profileSupervisor');
      })->name('profile');
    });

    // Panels
    Route::group(['middleware'=>['checkrole:panel']], function()
    {
      Route::get('/profilePanel',function() {
          return view('/panel/profilePanel');
      })->name('profile');

      Route::get('/panel', [PanelController::class, 'index']);
      Route::get('/panel/alltitle', [PanelController::class, 'alltitle']);
      // Route::get('/titleinfos/{titleinfo}', 'coordinatorController@show');
      // Route::post('/titleinfos/{titleinfo}', 'coordinatorController@show');
      // Route::patch('/titleinfos/{titleinfo}', 'coordinatorController@update');
      // Route::put('/coordinatoraccept/{titleinfo}', 'coordinatorController@acceptbtn');
      // Route::put('/coordinatorreject/{titleinfo}', 'coordinatorController@rejectbtn');
    });

    //ammar punyo
    Route::group(['middleware'=>['checkrole:student']], function()
    {
        Route::get('/profile',function() {
            return view('/ammar/profile');
        })->name('profile');

    });
});
