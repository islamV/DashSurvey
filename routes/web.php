<?php

use App\Http\Controllers\SurveyController;
use Illuminate\Support\Facades\Route;
use Modules\Surveys\App\Http\Controllers\SurveysController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
route::get('pusher', function () {
    return view('pusher');
});
