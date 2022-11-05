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



Route::POST('createuser', [ApiController::class, 'createuser']);


// Api Urls

// Engineers

// Create : 'api/createEngineer';
// view All Data : 'api/viewengineer';
// View Single id : 'api/viewengineerdetails/bb-eng-001';
// Delete Row : 'api/deleteeng/bb-eng-001';


Route::POST('createEngineer', [EngineerController::class, 'createEngineer']);
Route::GET('viewengineer', [EngineerController::class, 'viewengineer']);
Route::GET('viewengineerdetails/{engid}', [EngineerController::class, 'viewengineerdetails']);
Route::GET('deleteeng/{engid}', [EngineerController::class, 'deleteeng']);


Route::POST('drawrequest', [DrawingController::class, 'drawrequest']);
Route::POST('replydraw', [DrawingController::class, 'replydraw']);

Route::POST('createUser', [UserController::class, 'createUser']);


// To create Area
Route::POST('createarea', [ApiController::class, "createArea"]);

// To view Area
Route::get('viewarea/{id}', [ApiController::class, "viewArea"]);

// To View Area all
Route::get("viewallarea", [ApiController::class, "viewallarea"]);


// To Update Area
Route::put('updatearea/{id}', [ApiController::class, "updateArea"]);

// To Delete Area
Route::post('deletearea/{id}', [ApiController::class, "deleteArea"]);


// To create Zone
Route::POST('createzone', [ApiController::class, "createzone"]);

// To view zone
Route::get('viewzone/{id}', [ApiController::class, "viewzone"]);


// To View All zone
Route::get("viewallzone", [ApiController::class, "viewallzone"]);

// To Update zone
Route::POST('updatezone/{id}', [ApiController::class, "updatezone"]);

// To Delete zone
Route::post('deletezone/{id}', [ApiController::class, "deletezone"]);


//to get taluka
Route::post("getTaluk/{id}", [ApiController::class, "getTaluk"]);
