<?php

use App\Http\Controllers\Api\ApiAboutController;
use App\Http\Controllers\Api\ApiCategoryController;
use App\Http\Controllers\Api\ApiCompanyController;
use App\Http\Controllers\Api\ApiContactController;
use App\Http\Controllers\Api\ApiJobController;
use App\Http\Controllers\Api\ApiLocationController;
use App\Http\Controllers\Api\ApiQuestionController;
use App\Http\Controllers\Api\ApiServiceController;
use App\Http\Controllers\Api\ApiTeamController;
use App\Http\Controllers\Api\ApiTestimonyController;
use App\Http\Controllers\Api\ApiTypeController;
use App\Http\Controllers\Api\ApiUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('about', ApiAboutController::class)->middleware('auth:sanctum');
Route::apiResource('categories', ApiCategoryController::class)->middleware('auth:sanctum');
Route::apiResource('jobs', ApiJobController::class)->middleware('auth:sanctum');

Route::apiResource('teams', ApiTeamController::class)->middleware('auth:sanctum');
Route::apiResource('testimonies', ApiTestimonyController::class)->middleware('auth:sanctum');
Route::apiResource('companies', ApiCompanyController::class)->middleware('auth:sanctum');
Route::apiResource('contact', ApiContactController::class)->middleware('auth:sanctum');
Route::apiResource('locations', ApiLocationController::class)->middleware('auth:sanctum');
Route::apiResource('questions', ApiQuestionController::class)->middleware('auth:sanctum');
Route::apiResource('services', ApiServiceController::class)->middleware('auth:sanctum');
Route::apiResource('types', ApiTypeController::class)->middleware('auth:sanctum');
Route::post('/register',[ApiUserController::class, 'register']);

