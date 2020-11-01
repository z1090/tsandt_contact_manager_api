<?php

use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\ContactsAtCompanyController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\NotesController;
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



// Company Routes
Route::prefix('companies')->group(function () {
    Route::get('', [CompaniesController::class, 'index']);
    Route::middleware('auth:sanctum')->get('{company}', [CompaniesController::class, 'show']);
});

// Contacts at a company routes
Route::prefix('companies/{company}')->middleware('auth:sanctum')->group(function () {
    Route::get('contacts', [ContactsAtCompanyController::class, 'index']);
    Route::post('contact', [ContactsAtCompanyController::class, 'store']);
    Route::post('contacts', [ContactsAtCompanyController::class, 'storeMany']);
});

// Contacts routes
Route::prefix('contacts')->middleware('auth:sanctum')->group(function () {
    // Single Contact
    Route::post('', [ContactsController::class, 'store']);
    Route::get('{contact}', [ContactsController::class, 'show']);
    Route::put('{contact}', [ContactsController::class, 'update']);

    // Multiple Contacts (search and pagination)
    Route::get('', [ContactsController::class, 'index'])->name('contacts');
    Route::get('list/{perPage}', [ContactsController::class, 'paginate']);
});

// Notes routes
Route::prefix('contacts/{contact}')->middleware('auth:sanctum')->group(function () {
    Route::post('note', [NotesController::class, 'store']);
    Route::post('notes', [NotesController::class, 'storeMany']);
});
