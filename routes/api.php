<?php

use App\Http\Controllers\CompaniesController;
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

Route::prefix('companies')->group(function () {
    Route::get('', [CompaniesController::class, 'index']);
    Route::middleware('auth:sanctum')->get('{company}', [CompaniesController::class, 'show']);
});
