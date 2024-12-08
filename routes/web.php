<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/users', [UserController::class, 'index']);

Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/dashboard-kegiatan', [App\Http\Controllers\PageController::class, 'dashboardKegiatan'])->name('dashboard-kegiatan');
Route::get('admin/create-kegiatan', [App\Http\Controllers\PageController::class, 'createKegiatan'])->name('create-kegiatan');
Route::get('admin/list-kegiatan', [App\Http\Controllers\PageController::class, 'listKegiatan'])->name('list-kegiatan');
Route::get('admin/calendar', [App\Http\Controllers\PageController::class, 'calendar'])->name('calendar');
Route::get('admin/detail-kegiatan/{id}', [App\Http\Controllers\PageController::class, 'detail-kegiatan'])->name('detail-kegiatan');
Route::get('admin/evaluation/{id}', [App\Http\Controllers\PageController::class, 'evaluation'])->name('evaluation');

Route::get('admin/kelola-pengguna', [App\Http\Controllers\PageController::class, 'kelolaPengguna'])->name('kelola-pengguna');