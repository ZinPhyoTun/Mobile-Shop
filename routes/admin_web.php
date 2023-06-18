<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Backend\Admin\AdminController;

Route::group(['prefix' => 'admin'], function () {

    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->middleware('guest:admin_user')->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'login']);
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

    Route::get('/', [AdminController::class, 'adminPanel'])->middleware('admin')->name('admin.index');

    Route::get('/administrators', [AdminController::class, 'getAdministratorPage'])->name('admin.administrators.index');
    Route::get('/administrators/all', [AdminController::class, 'getAdministrators'])->name('admin.administrators.all');
    Route::get('/administrators/create', [AdminController::class, 'createAdminPage'])->name('admin.administrators.create');
    Route::post('/administrators/create', [AdminController::class, 'storeAdmin'])->name('admin.administrators.store');
    Route::get('/administrators/{id}', [AdminController::class, 'createAdminUpdatePage']);
    Route::post('/administrators/{id}', [AdminController::class, 'updateAdminData']);
    Route::get('/administrators/delete/{id}', [AdminController::class, 'deleteAdmin']);
    Route::get('/administrators/show/{id}', [AdminController::class, 'showAdmin']);

    Route::get('/users', [AdminController::class, 'getUserPage'])->name('admin.users.index');

    Route::get('/categories', [AdminController::class, 'getCategoriesPage'])->name('admin.categories.index');

    Route::get('/products', [AdminController::class, 'getProductsPage'])->name('admin.products.index');
});
