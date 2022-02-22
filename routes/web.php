<?php

use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\InfoKemdikbudController;
use App\Http\Controllers\InfoScholarshipController;
use App\Http\Controllers\InfoSeminarController;
use App\Http\Controllers\InfoTrainingProgramController;
use App\Http\Controllers\StudentExchangesController;
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

Route::get('user',function(){
    return view('user.user');
});

Route::get('activity-user',function(){
    return view('user.activity_user');
});

Route::get('info-seminar',[InfoSeminarController::class,'index']);
Route::post('info-seminar/store',[InfoSeminarController::class,'store']);
Route::post('info-seminar/update',[InfoSeminarController::class,'update']);

Route::get('info-kemdikbud',[InfoKemdikbudController::class,'index']);
Route::post('info-kemdikbud/store',[InfoKemdikbudController::class,'store']);
Route::post('info-kemdikbud/update',[InfoKemdikbudController::class,'update']);

Route::get('competition',[CompetitionController::class,'index']);
Route::post('competition/store',[CompetitionController::class,'store']);
Route::post('competition/update',[CompetitionController::class,'update']);

Route::get('info-training',[InfoTrainingProgramController::class,'index']);
Route::post('info-training/store',[InfoTrainingProgramController::class,'store']);
Route::post('info-training/update',[InfoTrainingProgramController::class,'update']);

Route::get('student-ex',[StudentExchangesController::class,'index']);
Route::post('student-ex/store',[StudentExchangesController::class,'store']);
Route::post('student-ex/update',[StudentExchangesController::class,'update']);

Route::get('info-scholarship',[InfoScholarshipController::class,'index']);
Route::post('info-scholarship/store',[InfoScholarshipController::class,'store']);
Route::post('info-scholarship/update',[InfoScholarshipController::class,'update']);

