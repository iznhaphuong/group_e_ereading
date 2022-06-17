<?php

use App\Http\Controllers\CreationController;
use App\Http\Controllers\FollowingCreationController;
use App\Models\FollowingCreation;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    // return view('user.creation.reading');
    return view('user.creation.home');
    // return view('admin.management.user'); - loi
    // return view('admin.management.category'); -loi
    // return view('admin.management.chapter');
});

Route::get('/admin', function () {
    return view('admin.management.creation');
});

Route::get('chi-tiet/{id}', [CreationController::class, 'show'])->name('detail');

Route::get('dang-theo-doi', [FollowingCreationController::class, 'index'])->name('following');
Route::get('dang-theo-doi/search', [FollowingCreationController::class, 'search']);

Route::get('lich-su', function () {
    return view('user.creation.history');
})->name('history');

Route::get('dang-nhap', function () {
    return view('user.auth.login');
});

Route::get('dang-ki', function () {
    return view('user.auth.register');
});
