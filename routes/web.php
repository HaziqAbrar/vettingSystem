<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\CoordinatorController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\SupervisorController;
use App\Mail\notify;
use App\Mail\dashy;
use App\Models\notification;

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
  // return "hello";
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


      Route::get('/coordinator', [CoordinatorController::class, 'index']);
      Route::get('/coordinator/alltitle', [CoordinatorController::class, 'alltitle']);
      Route::get('/info/{titleinfo}', [CoordinatorController::class, 'create']);
      Route::post('/assignpanel', [CoordinatorController::class, 'store']);
      Route::get('/titledetail/{titleinfo}', [CoordinatorController::class, 'show']);
      Route::patch('/comment/{titleinfo}', [CoordinatorController::class, 'update']);
      Route::put('/accepted/{titleinfo}', [CoordinatorController::class, 'acceptbtn']);
      Route::put('/coordinatorreject/{titleinfo}', [CoordinatorController::class, 'rejectbtn']);
    });

    // Supervisors
    Route::group(['middleware'=>['checkrole:supervisor']], function()
    {
      Route::get('/profileSupervisor',function() {
          return view('/supervisor/profileSupervisor');
      })->name('profile');

      Route::get('/supervisor', [SupervisorController::class, 'index'])->name('supervisor');
      Route::get('/supervisor/teams', [SupervisorController::class, 'teams']);
      Route::get('/supervisor/meeting', [SupervisorController::class, 'viewmeet']);
      Route::get('/supervisor/teamslist', [SupervisorController::class, 'teamshow']);
      Route::get('/supervisor/teams/teams', [SupervisorController::class, 'teamshow']);
      Route::get('/supervisor/teams/meeting/{title}', [SupervisorController::class, 'meet']);
      Route::post('/supervisor/teams/meeting', [SupervisorController::class, 'notify']);
      Route::get('/supervisor/test', [SupervisorController::class, 'test']);
      Route::get('/supervisor/teams/{title}',[SupervisorController::class, 'application']);

      Route::get('/supervisor/teams/title/{student}',[SupervisorController::class, 'applicationindex']);
      Route::get('/supervisor/create', [SupervisorController::class, 'create']);
      Route::post('/supervisor', [SupervisorController::class, 'store']);
      Route::post('/meetupdate', [SupervisorController::class, 'meetupdate']);
      Route::post('/done', [SupervisorController::class, 'meetdone']);
      Route::get('/titleinfosv/{titleinfo}', [SupervisorController::class, 'show']);
      Route::delete('/supervisor/{titleinfo}', [SupervisorController::class, 'destroy']);
      Route::delete('/supervisor/teamManagement1/{app}', [SupervisorController::class, 'reject1']);
      Route::delete('/supervisor/teamManagement2/{app}', [SupervisorController::class, 'reject2']);
      Route::delete('/supervisor/teamManagement3/{app}', [SupervisorController::class, 'reject3']);
      Route::delete('/supervisor/teamManagement1/accept/{app}', [SupervisorController::class, 'accept1']);
      Route::delete('/supervisor/teamManagement2/accept/{app}', [SupervisorController::class, 'accept2']);
      Route::delete('/supervisor/teamManagement3/accept/{app}', [SupervisorController::class, 'accept3']);
    //   Route::post('/supervisor/teamManagement', [SupervisorController::class, 'reject']);
    Route::get('/titleinfosv/{titleinfo}/edit', [SupervisorController::class, 'edit']);
    Route::patch('/supervisor/{titleinfo}', [SupervisorController::class, 'update']);
  });

  // Panels
  Route::group(['middleware' => ['checkrole:panel']], function () {
    Route::get('/profilePanel', function () {
      return view('/panel/profilePanel');
    })->name('profile');

    Route::get('/panel', [PanelController::class, 'index']);
    Route::get('/panel/alltitle', [PanelController::class, 'alltitle']);
    Route::get('/titleinfos/{titleinfo}', [PanelController::class, 'show']);
    Route::patch('/titleinfos/{titleinfo}', [PanelController::class, 'update']);

    Route::put('/panelaccept/{titleinfo}', [PanelController::class, 'acceptbtn']);
    Route::put('/panelreject/{titleinfo}', [PanelController::class, 'rejectbtn']);
  });

  //Student
  Route::group(['middleware' => ['checkrole:student']], function () {
    Route::get('/email', function () {
      // Mail::to('email@email.com')->send(new notify());

      // return new notify($noti);
      return new dashy();
    });

    Route::get('/profile', function () {
      return view('/student/profile');
    })->name('profile');

    Route::post('/propose', 'App\Http\Controllers\StudentController@sendpropose');
    Route::get('/propose/{noti}', 'App\Http\Controllers\StudentController@propose');
    Route::get('/portfolio', 'App\Http\Controllers\StudentController@index');
    Route::post('/portfolio', 'App\Http\Controllers\StudentController@update');


    //display title list
    Route::get('/title', 'App\Http\Controllers\TitlesController@index')->name('title');

    //display title details
    Route::get('/title/{title}', 'App\Http\Controllers\TitlesController@show');

    Route::get('/title/agree1/{first}', 'App\Http\Controllers\TitlesController@agree1');
    Route::get('/title/agree2/{second}', 'App\Http\Controllers\TitlesController@agree2');
    Route::get('/title/agree3/{third}', 'App\Http\Controllers\TitlesController@agree3');
    //apply title
    Route::post('/title', 'App\Http\Controllers\TitlesController@store');
  });
});
