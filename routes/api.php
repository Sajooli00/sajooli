<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('product/store',[\App\Http\Controllers\ProductController::class,'StoreProduct']);
Route::post('article/store',[\App\Http\Controllers\ArticleController::class,'StoreArticle']);
Route::get('product/store',[\App\Http\Controllers\ProductController::class,'seyhello']);
Route::get('article/{article:id}/show', [\App\Http\Controllers\ArticleController::class,'show']);
Route::get('article/list', [\App\Http\Controllers\ArticleController::class,'showList']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
