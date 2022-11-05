<?php

use App\Http\Controllers\CreateAreaController;
use App\Http\Controllers\CreateZoneController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ZoneCreationSuccess;
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






Route::get("/dashboard", [DashboardController::class, "index"]);

Route::get("/", [CreateAreaController::class, "index"])->middleware(['auth']);

// Route for  createArea
Route::get("/create_area", [CreateAreaController::class, "index"]);
Route::post("/create_area", [CreateAreaController::class, "store"]);

// Route for  createZone
Route::get("/create_zone", [CreateZoneController::class, "index"]);
Route::post("/create_zone", [CreateZoneController::class, "store"]);


// Success Zone Creation
// Route::get("zone_creation_success", [ZoneCreationSuccess::class, "index"]);


require __DIR__ . '/auth.php';
