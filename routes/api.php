<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\DrawingController;
use App\Http\Controllers\EngineerController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::POST('createuser',[ApiController::class,'createuser']);


// Api Urls

// Engineers

// Create : 'api/createEngineer';
// view All Data : 'api/viewengineer';
// View Single id : 'api/viewengineerdetails/bb-eng-001';
// Delete Row : 'api/deleteeng/bb-eng-001';


Route::POST('createEngineer',[EngineerController::class,'createEngineer']);
Route::GET('viewengineer',[EngineerController::class,'viewengineer']);
Route::GET('viewengineerdetails/{engid}',[EngineerController::class,'viewengineerdetails']);
Route::GET('deleteeng/{engid}',[EngineerController::class,'deleteeng']);


Route::POST('drawrequest',[DrawingController::class,'drawrequest']);
Route::POST('replydraw',[DrawingController::class,'replydraw']);

Route::POST('createUser',[UserController::class,'createUser']);
