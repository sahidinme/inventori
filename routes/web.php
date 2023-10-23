<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\ProductController;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\CategoryProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::resource('/categories', CategoryProductController::class)->only([
    'index', 'store', 'update', 'destroy'
]);

Route::resource('/product', ProductController::class)->only([
    'index', 'store', 'update', 'destroy'
]);

// Route::resource('/categories', CategoryController::class)->only([
//     'index', 'store', 'update', 'destroy'
// ])->middleware('UserAccess:1'); // kalo role bukan 1 (admin) maka tidak bisa akses

