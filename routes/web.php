<?php

use App\Http\Controllers\FavorisController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;


Route::get('/products/search', [ProductController::class, 'search'])->name('search_product');
Route::get('/products/show/{id}', [ProductController::class, 'show'])->name('show_products');
Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/users/index', [ProductController::class, 'index'])->name('home');
Route::get('/favoris', [FavorisController::class, 'show'])->name('show_favoris');
Route::get('/users', [UsersController::class, 'show'])->name('show_users');
Route::get('/roles', [RoleController::class, 'show'])->name('show_roles');
Route::get('/users/edit/{id}', [UsersController::class, 'edit'])->name('edit_user');
Route::post('/users/update/{id}', [UsersController::class, 'update'])->name('update_user');
Route::post('/users/delete/{id}', [UsersController::class, 'delete'])->name('delete_user');
Route::post('/roles/delete/{id}', [RoleController::class, 'delete'])->name('delete_role');
Route::get('/roles/roles/create', [RoleController::class, 'create'])->name('create_role');
Route::post('/roles/create', [RoleController::class, 'store'])->name('store_role');
Route::get('/roles/edit/{id}', [RoleController::class, 'edit'])->name('edit_role');
Route::post('/roles/update/{id}', [RoleController::class, 'update'])->name('update_role');
Route::get('/roles/affect/{id}', [RoleController::class, 'affect'])->name('affect_role');
Route::post('/roles/affect/{id}', [RoleController::class, 'assign'])->name('assign_role');





// Route::middleware(AdminMiddleware::class)->group(function (){
    Route::get('/products/delete/{id}', [ProductController::class, 'delete'])->name('delete_product');
    Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('edit_product');
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('create_product');
    Route::post('/admin/products/store', [ProductController::class, 'store'])->name('store_product');
    Route::post('/admin/products/update/{id}', [ProductController::class, 'update'])->name('update_product');
// });

Route::get('/login', [LoginController::class, 'loginForm'])->name('login_form');
Route::get('/register', [RegisterController::class, 'RegisterForm'])->name('register_form');
Route::post('/register/register', [RegisterController::class, 'Register'])->name('register');
Route::post('/login/login', [LoginController::class, 'Login'])->name(('login'));
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
Route::post('/favoris/toggle/{product}', [FavorisController::class, 'toggle'])->name('toggle_favoris');