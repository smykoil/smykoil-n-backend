<?php

use App\Http\Controllers\API\Blog\CategorizableController;
use App\Http\Controllers\API\Blog\CategoryController;
use App\Http\Controllers\API\MenuController;
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

Route::get('/menus/{name}', [MenuController::class, 'indexAction']);

Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'indexAction']);
    Route::post('/', [CategoryController::class, 'storeAction']);
    Route::get('/{id}', [CategoryController::class, 'showAction']);
    Route::put('/{id}', [CategoryController::class, 'updateAction']);
    Route::delete('/{id}', [CategoryController::class, 'destroyAction']);
});

Route::prefix('categorizables')->group(function () {
    Route::get('/', [CategorizableController::class, 'indexAction']);
    Route::post('/', [CategorizableController::class, 'storeAction']);
    Route::get('/{id}', [CategorizableController::class, 'showAction']);
    Route::put('/{id}', [CategorizableController::class, 'updateAction']);
    Route::delete('/{id}', [CategorizableController::class, 'destroyAction']);
});
