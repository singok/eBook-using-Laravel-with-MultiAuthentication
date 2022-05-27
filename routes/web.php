<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

/*----------- Admin Begin ------------------*/
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.login');
    Route::get('/register', [AdminController::class, 'registerForm'])->name('admin.register');
});
/*----------- Admin End --------------------*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
