<?php

use App\Http\Controllers\admin\AddProductController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\VendorController;
use App\Http\Controllers\admin\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
// Route::get('/add_product', [ProductController::class, 'addproduct'])->name('admin.addproduct');
// Route::post('/insert_product', [ProductController::class, 'insert'])->name('admin.insert');
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::view('/master', 'layouts.master');
Route::get('/noaccess', [AdminController::class, 'home'])->name('home');
Route::get('/', [AdminController::class, 'index'])->name('login')->middleware('admin.guest');
Route::post('/login', [AdminController::class, 'login'])->name('admin.login');

Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard')->middleware(['role', 'auth']);
Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::get('/changepassword', [AdminController::class, 'changepassword'])->name('admin.changepass');
Route::post('/updatepassword', [AdminController::class, 'updatePassword'])->name('admin.passwordupdate');
Route::get('/update_form', [AdminController::class, 'editform'])->name('admin.updateform');
Route::post('/update_user/{id}', [AdminController::class, 'edit_user'])->name('admin.editprofile');



Route::group(['prefix'=>'product'],function(){
    Route::get('/products',[AddProductController::class,'productList'])->name('product.productlist');
    Route::get('/productdata',[AddProductController::class,'getData'])->name('admin.getData');
    Route::get('/addproduct',[AddProductController::class,'productForm'])->name('product.addproduct');
    Route::post('/add_product',[AddProductController::class,'addProduct'])->name('add.products');
    Route::get('/editproduct/{id}',[AddProductController::class,'edit'])->name('admin.productedit');
    Route::post('/update/{id}',[AddProductController::class,'update'])->name('admin.updateproduct');
    Route::post('/delete/{id}',[AddProductController::class,'destroy'])->name('admin.product_delete');
    Route::post('/image_delete/{id}',[AddProductController::class,'deleteImage'])->name('admin.product_image_delete');
    Route::get('/product_image/{id}',[AddProductController::class,'productImage'])->name('admin.productimage');
    Route::post('/upload_image/{id}',[AddProductController::class,'uploadImage']);
});

Route::group(['prefix' => 'vendor'], function () {
    Route::get('/register_vendor', [VendorController::class, 'register_form'])->name('register');
    Route::post('/register', [VendorController::class, 'register_user'])->name('vender.register');
    Route::get('/edit_vendor/{id}', [VendorController::class, 'edit'])->name('edit.form');
    Route::post('/update/{id}', [VendorController::class, 'update_vendor'])->name('vendor.edit');
    Route::get('/dashboard', [VendorController::class, 'dashborad'])->name('vendor.dashboard');

});

Route::post('delete/user/{id}', [VendorController::class, 'destroy'])->name('delete_user');
Route::post('edit/status/{id}', [VendorController::class, 'update'])->name('edit.status');
Route::get('/list', [VendorController::class, 'venderlist'])->name('list');

Route::get('/data_get', [ProductController::class,'getdata']);
