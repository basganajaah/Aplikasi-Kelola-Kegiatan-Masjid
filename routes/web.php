<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/admin/create-kegiatan', [App\Http\Controllers\PageController::class, 'createKegiatan'])->name('create-kegiatan');
// Route::get('/admin/list-kegiatan', [App\Http\Controllers\PageController::class, 'listKegiatan'])->name('list-kegiatan');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


route::get('admin/dashboard', [HomeController::class, 'index'])->
middleware(['auth', 'admin']);


Route::get('/users', [UserController::class, 'index']);

Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/dashboard-kegiatan', [App\Http\Controllers\PageController::class, 'dashboardKegiatan'])->name('dashboard-kegiatan');
Route::get('admin/create-kegiatan', [App\Http\Controllers\PageController::class, 'createKegiatan'])->name('create-kegiatan');
Route::get('admin/list-kegiatan', [App\Http\Controllers\PageController::class, 'listKegiatan'])->name('list-kegiatan');
Route::get('admin/calendar', [App\Http\Controllers\PageController::class, 'calendar'])->name('calendar');
Route::get('admin/detail-kegiatan/{id}', [App\Http\Controllers\PageController::class, 'detail-kegiatan'])->name('detail-kegiatan');
Route::get('admin/evaluation/{id}', [App\Http\Controllers\PageController::class, 'evaluation'])->name('evaluation');

Route::get('admin/kelola-pengguna', [App\Http\Controllers\PageController::class, 'kelolaPengguna'])->name('kelola-pengguna');
