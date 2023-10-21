<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [App\Http\Controllers\UserController::class, 'home'])->name('home');

Route::get('/login_dashboard', [App\Http\Controllers\UserController::class, 'login_dashboard'])->name('login_dashboard');

Route::get('/registration_dashboard', [App\Http\Controllers\UserController::class, 'registration_dashboard'])->name('registration_dashboard');

Route::post('/create_user', [App\Http\Controllers\UserController::class, 'create_user'])->name('create_user');

Route::post('/login', [App\Http\Controllers\UserController::class, 'login'])->name('login');

Route::get('/admin_login', [App\Http\Controllers\UserController::class, 'admin_login'])->name('admin_login')->middleware('auth');

Route::get('/user_login', [App\Http\Controllers\UserController::class, 'user_login'])->name('user_login')->middleware('auth');

Route::get('/user_logout', [App\Http\Controllers\UserController::class, 'user_logout'])->name('user_logout');

Route::get('/edit_user', [App\Http\Controllers\UserController::class, 'edit_user'])->name('edit_user');

Route::put('/update/{id}', [App\Http\Controllers\UserController::class, 'update_user'])->name('update_user');

Route::delete('/delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('delete_user');
