<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LembagaController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PermohonanController;
use App\Http\Controllers\UserController;
use App\Livewire\Lembagas\IndexLembaga;
use App\Livewire\SKPD;
use App\Livewire\User;
use App\Models\Lembaga;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role as ModelsRole;

Route::get('/', [AuthController::class, 'Authenticate'])->name('login');
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [MainController::class, 'dasboard'])->name('dashboard');
    Route::get('/permission', [MainController::class, 'permission'])->name('permission');
    Route::get('/role', [MainController::class, 'role'])->name('role');
    Route::get('/skpd', SKPD::class)->name('skpd');
    Route::get('/user', User::class)->name('user.index');
    Route::get('/user-create', [UserController::class, 'create'])->name('user.create');
    Route::get('/lembaga', [LembagaController::class, 'index'])->name('lembaga');
    Route::get('/lembaga/uncreate', [LembagaController::class, 'uncreate'])->name('lembaga.uncreate');
    Route::get('/lembaga/show', [LembagaController::class, 'show'])->name('lembaga.show');
    Route::post('/lembaga/store', [LembagaController::class, 'store'])->name('lembaga.store');
    Route::get('/permohonan', [PermohonanController::class, 'index'])->name('permohonan');
    Route::get('/permohonan/create', [PermohonanController::class, 'create'])->name('permohonan.create');
});

Route::get('testing', function(){
    $user = Auth::user();
    $role = Role::find(1);
    return [
        'user' => $user,
        'has_role' => $user->roles,
        'role' => $role,
    ];
});