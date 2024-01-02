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

Route::get('/admin_login', [App\Http\Controllers\UserController::class, 'admin_login'])->name('admin_login')->middleware('auth', 'admin_login');

Route::get('/user_login', [App\Http\Controllers\UserController::class, 'user_login'])->name('user_login')->middleware('auth', 'user_login');

Route::get('/user_logout', [App\Http\Controllers\UserController::class, 'user_logout'])->name('user_logout');

Route::get('/edit_user', [App\Http\Controllers\UserController::class, 'edit_user'])->name('edit_user')->middleware('auth', 'isOwnUser');

Route::put('/user-update/{id}', [App\Http\Controllers\UserController::class, 'update_user'])->name('update_user')->middleware('auth');

Route::delete('/user-delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('delete_user')->middleware('auth');

Route::get('/personal-mission-user', [App\Http\Controllers\PersonalMissionController::class, 'personalMissionUser'])->name('personalMissionUser')->middleware('auth');

Route::get('/personal-mission-dashboard', [App\Http\Controllers\PersonalMissionController::class, 'personalMissionDashboard'])->name('personalMissionDashboard')->middleware('auth');

Route::post('/personal-mission-create', [App\Http\Controllers\PersonalMissionController::class, 'personalMissionCreate'])->name('personalMissionCreate')->middleware('auth');

Route::get('/personal-mission-admin-view', [App\Http\Controllers\PersonalMissionController::class, 'personalMissionAdminView'])->name('personalMissionAdminView')->middleware('auth', 'personalMissionAdminView');

Route::get('/personal-mission-user-view', [App\Http\Controllers\PersonalMissionController::class, 'personalMissionUserView'])->name('personalMissionUserView')->middleware('auth', 'personalMissionUserView');

Route::put('/personal-mission-user-edit-request/{id}', [App\Http\Controllers\PersonalMissionController::class, 'personalMissionUserEditRequest'])->name('personalMissionUserEditRequest')->middleware('auth');

Route::put('/personal-mission-user-accept-ignore/{id}', [App\Http\Controllers\PersonalMissionController::class, 'personalMissionAdminEditAcceptIgnoreRequest'])->name('personalMissionAdminEditAcceptIgnoreRequest')->middleware('auth');

Route::get('/personal-mission-user-mission-edit', [App\Http\Controllers\PersonalMissionController::class, 'personalMissionUserMissionEditDashboard'])->name('personalMissionUserMissionEditDashboard')->middleware('auth', 'isOwnUser');

Route::put('/personal-mission-user-mission-edit/{id}', [App\Http\Controllers\PersonalMissionController::class, 'personalMissionUserMissionEdit'])->name('personalMissionUserMissionEdit')->middleware('auth');

Route::get('/personal-mission-admin-mission-edit', [App\Http\Controllers\PersonalMissionController::class, 'personalMissionAdminMissionEditDashboard'])->name('personalMissionAdminMissionEditDashboard')->middleware('auth', 'isOwnUser');

Route::put('/personal-mission-admin-mission-update/{id}', [App\Http\Controllers\PersonalMissionController::class, 'personalMissionAdminMissionUpdate'])->name('personalMissionAdminMissionUpdate')->middleware('auth');

Route::get('/personal-mission-personal-mission-report-view', [App\Http\Controllers\PersonalMissionController::class, 'personalMissionReportView'])->name('personalMissionReportView')->middleware('auth', 'personalMissionReportView');

Route::get('/user-profile-view', [App\Http\Controllers\UserProfileController::class, 'adminProfileView'])->name('adminProfileView')->middleware('auth', 'admin_login');

Route::get('/admin-profile-edit', [App\Http\Controllers\UserProfileController::class, 'editAdminProfile'])->name('editAdminProfile')->middleware('auth');

