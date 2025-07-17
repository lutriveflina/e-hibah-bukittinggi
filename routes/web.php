<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'Authenticate'])->name('login');
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [MainController::class, 'dasboard'])->name('dashboard');
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user-create', [UserController::class, 'create'])->name('user.create');
    Route::get('/permission', [MainController::class, 'permission'])->name('permission');
    Route::get('/role', [MainController::class, 'role'])->name('role');
    Route::get('/role-create', [MainController::class, 'roleCreate'])->name('role.create');
});
