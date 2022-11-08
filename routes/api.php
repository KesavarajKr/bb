<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ApiDesignationController;
use App\Http\Controllers\ApiZoneController;
use App\Http\Controllers\ApiCreateAreaController;
use App\Http\Controllers\DrawingController;
use App\Http\Controllers\EngineerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ZoneController;

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
Route::POST('createarea', [ApiCreateAreaController::class, "createArea"]);

// To view Area
Route::get('viewarea/{id}', [ApiCreateAreaController::class, "viewArea"]);
// TO Edit view area
Route::get('editarea/{id}', [ApiCreateAreaController::class, "editArea"]);
// To View Area all
Route::get("viewallarea", [ApiCreateAreaController::class, "viewallarea"]);
// ReRender table
Route::POST("renderarea", [ApiCreateAreaController::class, "renderArea"]);
// To Update Area
Route::post('updatearea/{id}', [ApiCreateAreaController::class, "updateArea"]);
// To Delete Area
Route::post('deletearea/{id}', [ApiCreateAreaController::class, "deleteArea"]);

// Zone Api
Route::POST('createzone', [ApiZoneController::class, "createZone"]);
Route::post("getTaluk/{id}", [ApiZoneController::class, "getTaluk"]);
Route::post("renderzone", [ApiZoneController::class, "renderZone"]);
// To view zone
Route::get('viewzone/{id}', [ApiZoneController::class, "viewZone"]);
Route::post("getDistrict", [ApiZoneController::class, "getDistrict"]);
// TO Edit view zone
Route::post('editzone/{id}', [ApiZoneController::class, "editZone"]);
// To Update zone
Route::post('updatezone/{id}', [ApiZoneController::class, "updateZone"]);
// To Delete Zone
Route::post('deletezone/{id}', [ApiZoneController::class, "deleteZone"]);




//Desigation api
Route::post("createdesignation", [ApiDesignationController::class, "createDesignation"]);
Route::post("renderdesignation", [ApiDesignationController::class, "renderDesignation"]);
Route::get('viewdesignation/{id}', [ApiDesignationController::class, "viewDesignation"]);
Route::post('editdesignation/{id}', [ApiDesignationController::class, "editDesignation"]);
Route::post('updatedesignation/{id}', [ApiDesignationController::class, "updateDesignation"]);
Route::post('deletedesignation/{id}', [ApiDesignationController::class, "deleteDesignation"]);
