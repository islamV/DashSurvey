<?php

use Illuminate\Support\Facades\Route;
use Modules\Complaints\App\Http\Controllers\ComplaintsController;
use Modules\Complaints\App\Models\Complaint;

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
    Route::resource('complaints', ComplaintsController::class)->names('complaints');
});

route::get('view/{complain_id}' , function ($complain_id){
    $complain = Complaint::where('id' , $complain_id )->first();
    $complain->show_status = 1;
    $complain->save();
    return redirect('dash/resource/'.ucfirst($complain->survey->service->type)."Complaint/".$complain->id);
})->name('show_complaint');    
