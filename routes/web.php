<?php

use App\Http\Controllers\CreationController;
use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\CreationController;
=======
use App\Http\Controllers\ReadingController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\RatingController;

>>>>>>> main
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
    // return view('user.creation.following');
    // return view('user.creation.history');
    // return view('user.creation.reading');
    // return view('user.creation.home');
    // return view('admin.management.user'); - loi
    // return view('admin.management.category'); -loi
    return view('admin.management.creation');
    // return view('admin.management.chapter');
    // return view('user.creation.detail');
});


Route::resource('admin', CreationController::class);

// Route::get('/reading',[ReadingController::class,'index']);

Route::get('/admin', function () {
    return view('admin.management.creation');
});

Route::get('chi-tiet/{id}', [CreationController::class, 'show'])->name('detail');

Route::get('dang-theo-doi', function () {
    return view('user.creation.following');
})->name('following');

Route::get('lich-su', function () {
    return view('user.creation.history');
})->name('history');

Route::get('dang-nhap', function () {
    return view('user.auth.login');
});

Route::get('dang-ki', function () {
    return view('user.auth.register');
});
Route::get('reading/{creationId}/chapter/{id}', [ChapterController::class, 'show'])->name('chapter.show');

Route::post('/add-rating', [RatingController::class, 'add'])->name('rating');
