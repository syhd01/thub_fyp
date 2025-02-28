<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::prefix('admin')->name('admin.')->group(function(){

    Route::middleware(['guest:admin'])->group(function(){
        Route::view('/login', 'back.pages.admin.auth.login')->name('login');
    });

    Route::middleware(['auth:admin'])->group(function(){
        //paused 13/5/24 - add here later vid #7 timestamp 1:52
        Route::view('/home', 'back.pages.admin.home')->name('home');
    });

    Route::middleware(['guest:admin'])->group(function(){
        Route::view('/forgot-password', 'back.pages.admin.auth.forgot')->name('forgot');
    });

    Route::middleware(['guest:admin'])->group(function(){
        Route::view('/reset-password', 'back.pages.admin.auth.reset')->name('reset');
        Route::post('/login_handler', [AdminController::class, 'loginHandler'])->name('login_handler');
    });

    Route::middleware(['guest:admin'])->group(function(){
        Route::view('/product-list', 'back.pages.admin.product.product')->name('product');
    });

    
});

/*
Route::get('/admin', function(){
    return 'hello admin';
}
); */