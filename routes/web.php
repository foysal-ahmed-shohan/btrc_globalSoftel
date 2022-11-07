<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\User\UserFileController;
use App\Http\Controllers\Admin\UserActivityController;
use App\Http\Controllers\Admin\FileDownloadActivityController;


Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('visitor.index');
});

//Route::get('/visitor/index', [App\Http\Controllers\HomeController::class, 'visitor_index'])->name('visitor.index');
Auth::routes();
Route::middleware('auth')->group(function () {
//************************************* USER section *************************************
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/user-index', [App\Http\Controllers\HomeController::class, 'user_index'])->name('user.index');
    Route::resource('allFile', UserFileController::class);
//************************************* end user section**********************************


//************************************* ADMIN section *************************************
    Route::group(['middleware' => ['is_admin']], function ()  {
        Route::get('/admin-index', [App\Http\Controllers\HomeController::class, 'admin_index'])->name('admin.index');
        Route::resource('documentFile', FileController::class);
        // user activity section
        Route::resource('userLoginActivity', UserActivityController::class);
        Route::resource('fileDownloadActivity', FileDownloadActivityController::class);
//************************************* end admin section  *****************************************
});//is_admin end
});// user authentication end
