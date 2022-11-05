<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\CreateAreaController;
use App\Http\Controllers\CreateZoneController;
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
    return view('pages.login');
});

// Route for  createArea
Route::get("/create_area", [CreateAreaController::class, "index"]);

// Route for  createZone
Route::get("/create_zone", [CreateZoneController::class, "index"]);



Route::view('dashboard', 'pages.dashboard');
