<?php

use App\Http\Controllers\API\CategoryController;
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

Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'indexAction']);
    Route::post('/', [CategoryController::class, 'storeAction']);
    Route::get('/{id}', [CategoryController::class, 'showAction']);
    Route::put('/{id}', [CategoryController::class, 'updateAction']);
    Route::delete('/{id}', [CategoryController::class, 'destroyAction']);
});
