<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

route::get('admin/dashboard', [HomeController::class, 'index'])->
middleware(['auth', 'admin']);


Route::get('/users', [UserController::class, 'index']);
Route::get('admin/home', [HomeController::class, 'index'])->name('home');
Route::get('admin/dashboard-kegiatan', [PageController::class, 'dashboardKegiatan'])->name('dashboard-kegiatan');
Route::get('admin/create-kegiatan', [PageController::class, 'createKegiatan'])->name('create-kegiatan');
Route::get('admin/list-kegiatan', [PageController::class, 'listKegiatan'])->name('list-kegiatan');
Route::get('admin/calendar', [PageController::class, 'calendar'])->name('calendar');
Route::get('admin/detail-kegiatan/{id}', [PageController::class, 'detail-kegiatan'])->name('detail-kegiatan');
Route::get('admin/evaluation/{id}', [PageController::class, 'evaluation'])->name('evaluation');

Route::get('admin/kelola-pengguna', [PageController::class, 'kelolaPengguna'])->name('kelola-pengguna');
