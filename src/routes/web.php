<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PurchaseController;

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

Route::get('/', [ItemController::class, 'index']);
Route::get('/item/{item_id}', [ItemController::class, 'show']);
Route::middleware('auth')->group(function () {
    //Route::get('/', [AuthController::class, 'index']);
    Route::get('/?tab=mylist', [MyPageController::class, 'index']);
    Route::post('/item/{item_id}/favorite', [ItemController::class, 'toggleFavorite']);
    Route::post('/item/{item_id}/comment', [ItemController::class, 'storeComment']);
    Route::get('/sell', [ItemController::class, 'create']);
    Route::post('/sell', [ItemController::class, 'store']);
    Route::get('/purchase/{item_id}', [PurchaseController::class, 'create']);
    Route::post('/purchase/{item_id}', [PurchaseController::class, 'store']);
    Route::get('/mypage', [MyPageController::class, 'show']);
    Route::get('/mypage/profile', [MyPageController::class, 'edit']);
    Route::patch('/mypage/profile', [MyPageController::class, 'update']);
});
