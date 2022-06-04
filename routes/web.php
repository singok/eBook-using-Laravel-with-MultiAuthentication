<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

/*----------- Admin Begin ------------------*/
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.check');
    Route::get('/register', [AdminController::class, 'registerForm'])->name('admin.register');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('admin');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
});
/*----------- Admin End --------------------*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/download/{book}', [HomeController::class, 'download'])->name('downloadBook');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/download/book/{book}', [HomeController::class, 'download'])->name('download-book');
require __DIR__.'/auth.php';
