<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


//user login & registration authentication
Route::get('/', [LoginController::class, 'login'])->middleware('alreadyLogin');
Route::get('/register', [LoginController::class, 'register'])->middleware('alreadyLogin');
Route::post('/register-user', [LoginController::class, 'registerUser'])->name('user-register');
Route::post('/login-user', [LoginController::class, 'loginUser'])->name('user-login');
Route::get('/logout-user', [LoginController::class, 'logoutUser'])->name('user-logout');


//admin functionalities
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('isLoggedIn');
    Route::get('/view-category', [CategoryController::class, 'index'])->middleware('isLoggedIn');
    Route::get('/add-category', [CategoryController::class, 'addCategory'])->middleware('isLoggedIn');
    Route::post('/store-category', [CategoryController::class, 'storeCategory'])->name('store-category')->middleware('isLoggedIn');
    Route::get('/edit-category/{category_id}', [CategoryController::class, 'viewEditCategory'])->middleware('isLoggedIn');
    Route::put('/update-category/{category_id}', [CategoryController::class, 'updateCategory'])->middleware('isLoggedIn');
});
