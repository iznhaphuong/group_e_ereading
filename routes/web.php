<?php

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
    // return view('user.creation.following');
    // return view('user.creation.history');
    // return view('user.creation.reading');
    return view('user.creation.home');
    // return view('admin.management.user'); - loi
    // return view('admin.management.category'); -loi
    // return view('admin.management.creation');
    // return view('admin.management.chapter');
    return view('user.creation.detail');
});
