<?php

use Illuminate\Support\Facades\Route;



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
//************************************* end user section**********************************


//************************************* ADMIN section *************************************
    Route::group(['middleware' => ['is_admin']], function ()  {
        Route::get('/admin-index', [App\Http\Controllers\HomeController::class, 'admin_index'])->name('admin.index');
    Route::group(['prefix' => '/type'], function() {
        Route::resource('/package_category', \App\Http\Controllers\Admin\PackageCategoryController::class);
    });

//************************************* end admin section  *****************************************
});//is_admin end
});
//auth end

//****************************== visitor section ==****************************************
