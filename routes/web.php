<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KegiatanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users/home', function () {
    return view('pages.user.users-home');
})->middleware(['auth', 'verified'])->name('users-home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('admin/home', [HomeController::class, 'index'])->
middleware(['auth', 'admin'])->name('home');


Route::get('/users', [UserController::class, 'index']); // check user terdaftar

Route::get('admin/dashboard-kegiatan', [PageController::class, 'dashboardKegiatan'])->name('dashboard-kegiatan');
Route::get('admin/create-kegiatan', [PageController::class, 'createKegiatan'])->name('create-kegiatan');
// Route::get('admin/list-kegiatan', [PageController::class, 'listKegiatan'])->name('list-kegiatan');
Route::get('admin/calendar', [PageController::class, 'calendar'])->name('calendar');
Route::get('admin/detail-kegiatan/{id}', [PageController::class, 'detail-kegiatan'])->name('detail-kegiatan');
Route::get('admin/evaluation/{id}', [PageController::class, 'evaluation'])->name('evaluation');

Route::get('admin/kelola-pengguna', [PageController::class, 'kelolaPengguna'])->name('kelola-pengguna');

Route::post('admin/list-kegiatan', [KegiatanController::class, 'store'])->name('kegiatan.store');
Route::get('admin/list-kegiatan', [KegiatanController::class, 'index'])->name('list-kegiatan');
Route::delete('/kegiatan/{id}', [KegiatanController::class, 'destroy'])->name('kegiatan.destroy');