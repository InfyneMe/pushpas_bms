<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::redirect('/', '/login');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

Route::get('/home', function () {
    return view('admin.dashboard');
});
