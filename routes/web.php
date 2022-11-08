<?php

use App\Http\Controllers\CreateAreaController;
use App\Http\Controllers\CreateZoneController;
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
Route::get("/areas", [CreateAreaController::class, "index"]);

// Route for  createZone
Route::get("/zones", [CreateZoneController::class, "index"]);
// Route::post("/create_zone", [CreateZoneController::class, "store"]);


// Success Zone Creation
// Route::get("zone_creation_success", [ZoneCreationSuccess::class, "index"]);

Route::view('dashboard', 'pages.dashboard');
Route::view('users', 'pages.users');
