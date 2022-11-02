<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PackageCategoryController;
use App\Http\Controllers\Admin\PackageController;
//use App\Http\Controllers\SubscribeNewsletterController;
use App\Http\Controllers\Admin\CommerceOrderController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\Admin\AdminNotesStatusNameController;
use App\Http\Controllers\Admin\AdminNoteController;
use App\Http\Controllers\Admin\OrderStatusController;
use App\Http\Controllers\Admin\PDFController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\SearchFilterController;
use App\Http\Controllers\Admin\SendMailController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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
