<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::redirect('/', '/home');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

//admin dashboard
Route::get('/home', function () {
    return view('admin.dashboard');
});
