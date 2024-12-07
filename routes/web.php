<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/create-kegiatan', [App\Http\Controllers\PageController::class, 'createKegiatan'])->name('create-kegiatan');
Route::get('admin/list-kegiatan', [App\Http\Controllers\PageController::class, 'listKegiatan'])->name('list-kegiatan');