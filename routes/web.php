<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Auth\UserProfileController;
use App\Http\Controllers\CandidateController;
use App\Models\Admin;

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
    //return view('auth.login');
    return view('home');
});

Auth::routes();

Route::group(['prefix' => 'candidates', 'middleware' => 'auth'], function() {
    
    Route::get('/', [CandidateController::class, 'index'])->name('candidates.index');
    Route::get('/edit/{id}', [CandidateController::class, 'edit'])->name('candidates.edit');
    Route::put('/update/{id}', [CandidateController::class, 'update'])->name('candidates.update');
    
    // Update password
    Route::get('/user/update-password', [ChangePasswordController::class, 'userPasswordChange'])->name('user-password.change');
    Route::post('/user/update-password', [ChangePasswordController::class, 'userPasswordUpdate'])->name('user-password.update');


    // User Profile
    Route::get('/user/profile', [UserProfileController::class, 'edit'])->name('user-profile.edit');
    Route::post('/user/profile', [UserProfileController::class, 'update'])->name('user-profile.update');


});

Route::group(['prefix' => 'admin'], function() {
    
    Route::get('/login', [AdminController::class, 'viewLogin'])->name('admins.login')->middleware('admin');
    Route::post('/login', [AdminController::class, 'checkLogin'])->name('admins.check-login');
    Route::get('/index', [AdminController::class, 'index'])->name('admins.dashboard')->middleware('auth:admin');

    Route::get('/edit/candidate/{id}', [AdminController::class, 'edit'])->name('admins.edit-candidate')->middleware('auth:admin');
    Route::put('/update/candidate/{id}', [AdminController::class, 'update'])->name('admins.update-candidate')->middleware('auth:admin');

    //Route::post('/candidates/upload/{id}', [CandidateController::class, 'uploadFile'])->name('candidates.upload-file');

    // Update password
    Route::get('/update-password', [ChangePasswordController::class, 'adminPasswordChange'])->name('admin-password.change')->middleware('auth:admin');
    Route::post('/update-password', [ChangePasswordController::class, 'adminPasswordUpdate'])->name('admin-password.update')->middleware('auth:admin');

    // Forgot password
    Route::get('/password/reset-link', [AdminController::class, 'showPasswordResetLinkForm'])->name('admin.password-forget-form');
    Route::post('/password/reset-link', [AdminController::class, 'sendPasswordResetLink'])->name('admin.password-forget-link');
    Route::get('/password/reset-link/{token}', [AdminController::class, 'showPasswordResetForm'])->name('admin.password-reset-form');
    Route::post('/password/reset/', [AdminController::class, 'resetPassword'])->name('admin.password-reset');

    
    // Admin Profile
    Route::get('/profile', [AdminController::class, 'profileEdit'])->name('admin-profile.edit');
    Route::post('/profile', [AdminController::class, 'profileUpdate'])->name('admin-profile.update');



});




