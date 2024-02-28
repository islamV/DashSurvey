<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Surveys\App\Http\Controllers\SurveysController;
use Modules\Surveys\App\Models\Survey;

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

Route::group([], function () {
    Route::resource('surveys', SurveysController::class)->names('surveys');
});
Route::get('survey/{service}', [SurveysController::class,'store'])->name('servey');
route::get('done/{s}' , function( $service){
   
    return view('surveys::done',compact(['service']));
})->name('done');

route::get('getResults' , [SurveysController::class , 'index'])->name('getResults');