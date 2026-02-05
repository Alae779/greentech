<?php

use App\Http\Controllers\FavorisController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('products/index', [ProductController::class, 'getAll']);
});

Route::get('/products/search', [ProductController::class, 'search']);
Route::get('/products/show/{id}', [ProductController::class, 'show']);
Route::get('/', [ProductController::class, 'getAll']);
Route::get('/favoris', [FavorisController::class, 'show']);

Route::middleware(AdminMiddleware::class)->group(function (){
    Route::get('/products/delete/{id}', [ProductController::class, 'delete']);
    Route::get('/products/edit/{id}', [ProductController::class, 'edit']);
    Route::get('/admin/products/create', [ProductController::class, 'create']);
    Route::post('/admin/products/store', [ProductController::class, 'store']);
    Route::post('/admin/products/update/{id}', [ProductController::class, 'update']);
});

Route::get('/login', [LoginController::class, 'loginForm']);
Route::get('/register', [RegisterController::class, 'RegisterForm']);
Route::post('/register/register', [RegisterController::class, 'Register']);
Route::post('/login/login', [LoginController::class, 'Login']);
Route::post('/logout', [LogoutController::class, 'logout']);
Route::post('/favoris/toggle/{product}', [FavorisController::class, 'toggle']);