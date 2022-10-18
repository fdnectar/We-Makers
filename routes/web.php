<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ItemsController;
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
    Route::post('/update-category/{category_id}', [CategoryController::class, 'updateCategory'])->middleware('isLoggedIn');
    Route::get('/delete-category/{category_id}', [CategoryController::class, 'deleteCategory'])->middleware('isLoggedIn');

    Route::get('/view-items', [ItemsController::class, 'index'])->middleware('isLoggedIn');
    Route::get('/add-items', [ItemsController::class, 'addItems'])->middleware('isLoggedIn');
    Route::post('/store-item', [ItemsController::class, 'storeItem'])->name('store-item')->middleware('isLoggedIn');
    Route::get('/edit-item/{item_id}', [ItemsController::class, 'viewEditItem'])->middleware('isLoggedIn');
    Route::post('/update-item/{item_id}', [ItemsController::class, 'updateItem'])->middleware('isLoggedIn');
    Route::get('/delete-item/{item_id}', [ItemsController::class, 'deleteItem'])->middleware('isLoggedIn');
});
