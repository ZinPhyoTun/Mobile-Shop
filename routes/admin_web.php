<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Backend\Admin\AdminController;
use App\Http\Controllers\Backend\User\UserController;
use App\Http\Controllers\Backend\Category\CategoryController;

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

    Route::get('/users', [UserController::class, 'getUserPage'])->name('admin.users.index');
    Route::get('/users/all', [UserController::class, 'getUsers'])->name('admin.users.all');
    Route::get('/users/create', [UserController::class, 'createUserPage'])->name('admin.users.create');
    Route::post('/users/create', [UserController::class, 'storeUser'])->name('admin.users.store');
    Route::get('/users/{id}', [UserController::class, 'createUserUpdatePage']);
    Route::post('/users/{id}', [UserController::class, 'updateUserData']);
    Route::get('/users/delete/{id}', [UserController::class, 'deleteUser']);
    Route::get('/users/show/{id}', [UserController::class, 'showUser']);

    Route::get('/categories', [CategoryController::class, 'getCategoriesPage'])->name('admin.categories.index');
    Route::get('/categories/all', [CategoryController::class, 'getCategories'])->name('admin.categories.all');
    Route::get('/categories/create', [CategoryController::class, 'createCategoryPage'])->name('admin.categories.create');
    Route::post('/categories/create', [CategoryController::class, 'storeCategory'])->name('admin.categories.store');
    Route::get('/categories/{id}', [CategoryController::class, 'createCategoryUpdatePage']);
    Route::post('/categories/{id}', [CategoryController::class, 'updateCategoryData']);
    Route::get('/categories/delete/{id}', [CategoryController::class, 'deleteCategory']);

    Route::get('/products', [AdminController::class, 'getProductsPage'])->name('admin.products.index');
});
