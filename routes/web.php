<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoordinatorController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\SupervisorController;

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
   
    Route::post('/upload','App\Http\Controllers\UploadController@index');

    //Coordinators
    Route::group(['middleware'=>['checkrole:coordinator']], function()
    {
      Route::get('/profileCoordinator',function() {
          return view('/coordinator/profileCoordinator');
      })->name('profile');


      // Route::get('/coordinator', [CoordinatorController::class, 'index']);
      // Route::get('/coordinator/alltitle', [CoordinatorController::class, 'alltitle']);
      Route::get('/info/{titleinfo}', [CoordinatorController::class, 'show']);
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

      Route::get('/supervisor', [SupervisorController::class, 'index']);
      Route::get('/supervisor/teams', [SupervisorController::class, 'teams']);
      Route::get('/supervisor/teams/{title}',[SupervisorController::class, 'application']);

      Route::post('/supervisor/teams/title/student',[SupervisorController::class, 'applicationindex']);
      Route::get('/supervisor/create', [SupervisorController::class, 'create']);
      Route::post('/supervisor', [SupervisorController::class, 'store']);
      Route::get('/titleinfosv/{titleinfo}', [SupervisorController::class, 'show']);
      Route::delete('/supervisor/{titleinfo}', [SupervisorController::class, 'destroy']);
      Route::get('/titleinfosv/{titleinfo}/edit', [SupervisorController::class, 'edit']);
      Route::patch('/supervisor/{titleinfo}', [SupervisorController::class, 'update']);
    });

    // Panels
    Route::group(['middleware'=>['checkrole:panel']], function()
    {
      Route::get('/profilePanel',function() {
          return view('/panel/profilePanel');
      })->name('profile');

      Route::get('/panel', [PanelController::class, 'index']);
      Route::get('/panel/alltitle', [PanelController::class, 'alltitle']);
      Route::get('/titleinfos/{titleinfo}', [PanelController::class, 'show']);
      Route::patch('/titleinfos/{titleinfo}', [PanelController::class, 'update']);
      Route::put('/coordinatoraccept/{titleinfo}', [PanelController::class, 'acceptbtn']);
      Route::put('/coordinatorreject/{titleinfo}', [PanelController::class, 'rejectbtn']);
    });

    //Student
    Route::group(['middleware'=>['checkrole:student']], function()
    {
        Route::get('/profile',function() {
            return view('/student/profile');
        })->name('profile');
        Route::get('/portfolio',function() {
            return view('/student/portfolio');
        })->name('portfolio');

        //display title list
        Route::get('/title','App\Http\Controllers\TitlesController@index')->name('title');

        //display title details
        Route::get('/title/{title}','App\Http\Controllers\TitlesController@show');

        //apply title
        Route::post('/title','App\Http\Controllers\TitlesController@store');

    });
});
