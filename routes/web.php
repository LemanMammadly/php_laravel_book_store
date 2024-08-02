<?php

use App\Http\Controllers\Admin\BrandController as AdminBrandController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\ProductsController;
use App\Http\Controllers\admin\RegisterController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\front\AuthController;
use App\Http\Controllers\front\ContactController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\front\MessageController;
use App\Http\Controllers\Front\NotFoundController;
use App\Http\Controllers\Front\ProductDetailController;
use App\Http\Controllers\Front\ReviewController;
use App\Http\Controllers\Front\ShopController;
use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('front.home.index');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product/{slug}', [ProductDetailController::class, 'index'])->name('productDetail');
Route::get('/shoplist', [ShopController::class, 'index'])->name('productShop');
Route::get('/notFound', [NotFoundController::class, 'index'])->name('notfound');
Route::get('/logout',[LogoutController::class,'logout'])->name('logout');
Route::get('/contact',[ContactController::class,'index'])->name('contact');
Route::post('/send',[MessageController::class,'send'])->name('message');
Route::get('/auth',[AuthController::class,'index'])->name('auth');
Route::post('/auth-register',[AuthController::class,'store'])->name('auth.register');
Route::post('/auth-login',[AuthController::class,'login'])->name('auth.login');
Route::post('/comment',[ReviewController::class,'create'])->name('comment')->middleware('review');
Route::delete('/delete/{id}',[ReviewController::class,'delete'])->name('delete');

Route::prefix('admin1')->group(function(){
    Route::get('/',[UserController::class,'index'])->name('admin.home')->middleware('admin');
    Route::get('/login',[LoginController::class,'index'])->name('login');
    Route::post('/authenticate',[LoginController::class,'authenticate'])->name('login.authenticate');
    Route::get('/register',[RegisterController::class,'index'])->name('register')->middleware('adminRegister');
    Route::post('/signup',[RegisterController::class,'create'])->name('signup');
    Route::get('/update/{slug}',[UserController::class,'updateView'])->name('updateView')->middleware('userUpdate');
    Route::post('/updateUser/{slug}',[UserController::class,'update'])->name('update');
    Route::get('/updateUserOnly/{slug}',[UserController::class,'updateViewUser'])->name('updateViewUser');
    Route::post('/updateUserOnlyByAdmin/{slug}',[UserController::class,'updateUser'])->name('updateViewUserUpd');
    Route::resource('brands',AdminBrandController::class);
    Route::get('/products',[ProductsController::class,'index'])->name('admin.products');
});