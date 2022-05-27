<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

/*----------- Admin Begin ------------------*/
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.check');
    Route::get('/register', [AdminController::class, 'registerForm'])->name('admin.register');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('admin');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
});
/*----------- Admin End --------------------*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
