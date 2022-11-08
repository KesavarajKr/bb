<?php

use App\Http\Controllers\ApiCreateAreaController;
use App\Http\Controllers\ApiDesignationController;
use App\Http\Controllers\ApiZoneController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ZoneCreationSuccess;
use App\Http\Controllers\DrawingController;
use App\Http\Controllers\EngineerController;
use App\Http\Controllers\UserController;
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

Route::get("/dashboard", [DashboardController::class, "index"]);

Route::view("/", "pages.login");

// Route for  createArea
Route::get("/areas", [ApiCreateAreaController::class, "index"]);


// Route for  createZone
Route::get("/zones", [ApiZoneController::class, "index"]);

Route::get("designation", [ApiDesignationController::class, "index"]);




Route::view('dashboard', 'pages.dashboard');
Route::view('users', 'pages.users');
