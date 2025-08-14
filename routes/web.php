<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CrusherController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\CrusherModel;
use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::redirect('/', '/login');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

//admin dashboard
Route::get('/home', function () {
    return view('admin.dashboard');
});
Route::post('/signin', [AuthController::class, 'signin'])->name('signin');

// admin routes start here

//authentication routes
Route::prefix('authentication')->group(function () {
    Route::get('/users-list', [UserController::class, 'index'])->name('users.list');
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');

    //add users
    Route::post('/add-user', [UserController::class, 'store'])->name('user.store');
    Route::delete('/users/{uuid}', [UserController::class, 'destroy']);
});

Route::prefix('crusher')->group(function () {
    Route::get('/list', [CrusherController::class, 'index'])->name('crusher.list');
    Route::get('/add', [CrusherController::class, 'create'])->name('crusher.create');
    Route::post('/store', [CrusherController::class, 'store'])->name('crusher.store');
});