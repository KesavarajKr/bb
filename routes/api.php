<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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

// // To create Area
// Route::POST('createarea', [ApiController::class, "createArea"]);

// // To view Area
// Route::get('area/{id}', [ApiController::class, "viewArea"]);

// // To Update Area
// Route::POST('updatearea/{id}', [ApiController::class, "updateArea"]);

// // To Delete Area
// Route::post('deletearea/{id}', [ApiController::class, "deleteArea"]);


// To create Zone
Route::POST('createzone', [ApiController::class, "createzone"]);

// To view zone
Route::get('zone/{id}', [ApiController::class, "viewzone"]);

// To Update zone
Route::POST('updatezone/{id}', [ApiController::class, "updatezone"]);

// To Delete zone
Route::post('deletezone/{id}', [ApiController::class, "deletezone"]);
