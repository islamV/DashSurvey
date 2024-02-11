<?php

use Illuminate\Support\Facades\Route;
use Modules\Surveys\App\Http\Controllers\SurveysController;

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