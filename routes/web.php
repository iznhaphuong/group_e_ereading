<?php

use App\Http\Controllers\CreationController;
use App\Http\Controllers\FollowingCreationController;
use App\Http\Controllers\UserController;
use App\Models\FollowingCreation;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReadingController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;

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
    return view('user.creation.home');
    //     return view('admin.management.user');
    //     return view('admin.management.category');
    // return view('admin.management.chapter');
})->name('home');


//Trang admin
Route::get('admin/creation', [CreationController::class, 'index'])->name('admin.index');
Route::post('admin/creation', [CreationController::class, 'store'])->name('admin.store');
Route::post('admin/creation/update', [CreationController::class, 'update'])->name('admin.update');
Route::get('admin/creation/destroy', [CreationController::class, 'destroy'])->name('admin.destroy');

Route::resource('chapter', ChapterController::class);

// Route::get('/reading',[ReadingController::class,'index']);

// Route::get('/admin', function () {
//     return view('admin.management.creation');
// });
// Category
Route::get('admin/danh-muc', [CategoryController::class, 'index'])->name('category.index');
Route::post('admin/danh-muc', [CategoryController::class, 'store'])->name('category.create');
Route::put('admin/danh-muc/cap-nhat/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('admin/danh-muc/xoa', [CategoryController::class, 'destroy'])->name('category.delete');

// User
Route::get('admin/nguoi-dung', [UserController::class, 'index'])->name('user.index');
Route::post('admin/nguoi-dung', [UserController::class, 'store'])->name('user.create');
Route::post('admin/nguoi-dung/cap-nhat', [UserController::class, 'update'])->name('user.update');
Route::delete('admin/nguoi-dung/xoa', [UserController::class, 'destroy'])->name('user.delete');

Route::get('chi-tiet/{id}', [CreationController::class, 'show']);
Route::post('chi-tiet/{id}', [FollowingCreationController::class, 'destroy']);

Route::get('dang-theo-doi', [FollowingCreationController::class, 'index'])->name('following');
Route::post('dang-theo-doi',[FollowingCreationController::class, 'destroy']);

Route::get('lich-su', [CreationController::class, 'showHistory'])->name('history');

Route::get('dang-nhap', function () {
    return view('user.auth.login');
})->name('login');
Route::post('custom-login', [UserController::class, 'login'])->name('login.custom');

Route::get('dang-ki', function () {
    return view('user.auth.register');
})->name('register');
Route::post('custom-register', [UserController::class, 'create'])->name('register.custom');
Route::get('reading/{creationId}', [ChapterController::class, 'show'])->name('chapter.show');
//rating
Route::post('/add-rating', [RatingController::class, 'add'])->name('rating');
//read-chapter
Route::get('reading-{number}', [ChapterController::class, 'paginate'])->name('chapter.next');
//comment
Route::post('comment', [CommentController::class, 'add'])->name('comment.add');


Route::get('/notification', function () {
    return view('user.demo.notification');
});

Route::get('get-pusher', function (){
   return view('user.demo.form_pusher');
});

Route::get('/pusher', function(Illuminate\Http\Request $request) {
    event(new App\Events\PusherEvent($request));
    return redirect('get-pusher');
});
