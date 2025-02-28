<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::view('/example-page','example-page');
Route::view('/example-auth','example-auth');

require __DIR__.'/auth.php';

//insert route from (name).php into here in web.php for routing

include __DIR__.'/admin.php';
include __DIR__.'/customer.php';
include __DIR__.'/staff.php';
