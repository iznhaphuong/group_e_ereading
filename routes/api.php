<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\CreationController;
use App\Http\Controllers\FollowingCreationController;

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
//creation
Route::get('/admin/get-creation-version/{id}/{version}', [CreationController::class, 'checkVersion']);
Route::get('/admin/get-creation-data/{id}', [CreationController::class, 'getCreation']);

Route::get('/category/get-one/{id}', [CategoryController::class, 'getCategory']);
Route::get('/category/get-version/{id}', [CategoryController::class, 'getVersion']);
Route::get('/user/get-one/{id}', [UserController::class, 'getUser']);
Route::get('/user/get-version/{id}', [UserController::class, 'getVersion']);
Route::post('/follow', [FollowingCreationController::class, 'store']);
Route::post('/history', [CreationController::class, 'getHistory']);
Route::post('/isread', [CreationController::class, 'getRecentChap']);
