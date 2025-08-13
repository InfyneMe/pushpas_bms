<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::redirect('/', '/home');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

//admin dashboard
Route::get('/home', function () {
    return view('admin.dashboard');
});


// admin routes start here

//authentication routes
Route::prefix('authentication')->group(function () {
    Route::get('/users-list', [UserController::class, 'index'])->name('users.list');
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');

    Route::post('/add-user', [UserController::class, 'store'])->name('user.store');
});
