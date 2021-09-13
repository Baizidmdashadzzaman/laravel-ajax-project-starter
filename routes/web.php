<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\Usercontroller;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\CustomerController;
use App\Http\Controllers\backend\SettingController;
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
    return view('welcome');
});

Route::get('/login', [Usercontroller::class, 'login'])->name('login');
Route::post('/login-try', [Usercontroller::class, 'try_login'])->name('admin.login.try');
//ADMIN PROTECTED ROUTE START
Route::group(['middleware' => 'auth:web'], function () {
    
         //USER ROUTE
           Route::get('/admin-dashboard', [UserController::class, 'dashboard'])->name('admin.dashboard');
           Route::get('/admin-dashboard/admin-logout', [UserController::class, 'logout'])->name('admin.logout');
           Route::get('/admin-dashboard/changepassword', [UserController::class, 'change_password'])->name('admin.changepassword');
           Route::post('/admin-dashboard/changepassword', [UserController::class, 'change_password_try'])->name('admin.changepassword');
           
           Route::get('/admin-dashboard/user-list', [UserController::class, 'index'])->name('admin.user.list');
           Route::get('/admin-dashboard/user-create', [UserController::class, 'user_create'])->name('admin.user.create');
           Route::post('/admin-dashboard/user-store', [UserController::class, 'store'])->name('admin.user.store');
           Route::get('/admin-dashboard/user-edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
           Route::get('/admin-dashboard/user-show/{id}', [UserController::class, 'user_show'])->name('admin.user.show');
           Route::post('/admin-dashboard/user-update/{id}', [UserController::class, 'update'])->name('admin.user.update');
           Route::delete('/admin-dashboard/user-delete/{id}', [UserController::class, 'destroy'])->name('admin.user.delete');
           Route::post('/admin-dashboard/user-search', [UserController::class, 'user_search'])->name('admin.user.search'); 
           Route::get('/admin-dashboard/user-addpermission/{id}', [UserController::class, 'user_addpermission'])->name('admin.user.addpermission');
           Route::post('/admin-dashboard/user-savepermissin', [UserController::class, 'user_savepermissin'])->name('admin.user.savepermissin');	   
         //USER ROUTE
         
         //SYSTEM SETTING ROUTE
           Route::get('/admin-dashboard/system-setting', [SettingController::class, 'index'])->name('admin.system.setting');
           Route::post('/admin-dashboard/system-setting-update', [SettingController::class, 'store'])->name('admin.system.setting.update');	  
         //SYSTEM SETTING ROUTE
         

    
         //CATEGORY ROUTE
           Route::get('/admin-dashboard/category-list', [CategoryController::class, 'index'])->name('admin.category.list');
           Route::get('/admin-dashboard/category-create', [CategoryController::class, 'create'])->name('admin.category.create');
           Route::post('/admin-dashboard/category-store', [CategoryController::class, 'store'])->name('admin.category.store');
           Route::get('/admin-dashboard/category-edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
           Route::get('/admin-dashboard/category-show/{id}', [CategoryController::class, 'show'])->name('admin.category.show');
           Route::post('/admin-dashboard/category-update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
           Route::delete('/admin-dashboard/category-delete/{id}', [CategoryController::class, 'destroy'])->name('admin.category.delete');
           Route::post('/admin-dashboard/category-search', [CategoryController::class, 'search'])->name('admin.category.search');  
         //CATEGORY ROUTE

         //CUSTOMER ROUTE
           Route::get('/admin-dashboard/customer-list', [CustomerController::class, 'index'])->name('admin.customer.list');
           Route::get('/admin-dashboard/customer-create', [CustomerController::class, 'create'])->name('admin.customer.create');
           Route::post('/admin-dashboard/customer-store', [CustomerController::class, 'store'])->name('admin.customer.store');
           Route::get('/admin-dashboard/customer-edit/{id}', [CustomerController::class, 'edit'])->name('admin.customer.edit');
           Route::get('/admin-dashboard/customer-show/{id}', [CustomerController::class, 'show'])->name('admin.customer.show');
           Route::post('/admin-dashboard/customer-update/{id}', [CustomerController::class, 'update'])->name('admin.customer.update');
           Route::delete('/admin-dashboard/customer-delete/{id}', [CustomerController::class, 'destroy'])->name('admin.customer.delete');
           Route::post('/admin-dashboard/customer-search', [CustomerController::class, 'search'])->name('admin.customer.search');  
         //CUSTOMER ROUTE
    
    
    });
    //ADMIN PROTECTED ROUTE END
//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
