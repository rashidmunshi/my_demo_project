<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\VendorController;
use App\Http\Controllers\admin\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [AdminController::class, 'home'])->name('home');

Route::get('/login_form', [AdminController::class, 'index'])->name('login')->middleware('admin.guest');


Route::post('/login', [AdminController::class, 'login'])->name('admin.login');
Route::view('/master', 'layouts.master');

Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard')->middleware(['role', 'auth']);

Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::get('/changepassword', [AdminController::class, 'changepassword'])->name('admin.changepass');
Route::post('/updatepassword', [AdminController::class, 'updatePassword'])->name('admin.passwordupdate');
Route::get('/update_form', [AdminController::class, 'editform'])->name('admin.updateform');
Route::post('/update_user/{id}', [AdminController::class, 'edit_user'])->name('admin.editprofile');
Route::get('/add_product', [ProductController::class, 'addproduct'])->name('admin.addproduct');
Route::post('/insert_product', [ProductController::class, 'insert'])->name('admin.insert');


Route::group(['prefix' => 'vendor'], function () {
    Route::get('/register_form', [VendorController::class, 'register_form'])->name('register');
    Route::post('/register', [VendorController::class, 'register_user'])->name('vender.register');
    Route::get('/edit/{id}', [VendorController::class, 'edit'])->name('edit.form');
    Route::post('/edit/{id}', [VendorController::class, 'update_vendor'])->name('vendor.edit');
    Route::get('/dashboard', [VendorController::class, 'dashborad'])->name('vendor.dashboard');

});

Route::post('delete/user/{id}', [VendorController::class, 'destroy'])->name('delete_user');
Route::post('edit/status/{id}', [VendorController::class, 'update'])->name('edit.status');
Route::get('/list', [VendorController::class, 'venderlist'])->name('list');


Route::get('/data_get', [ProductController::class,'getdata']);
