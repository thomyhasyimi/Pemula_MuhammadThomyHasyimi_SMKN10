<?php

use App\Http\Controllers\BankController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Admin
Route::get('/', [UserController::class, 'index']);
Route::post('/', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);
Route::get('/user', [UserController::class, 'showUser']);
Route::get('/user/create', [UserController::class, 'create']);
Route::post('/user/create', [UserController::class, 'store']);
Route::get('/user/edit/{id}', [UserController::class, 'edit']);
Route::put('/user/edit/{id}', [UserController::class, 'update']);
Route::post('/user/{id}/delete', [UserController::class, 'destroy']);
Route::get('/user/transactions', [UserController::class, 'transactions']);
Route::get('/user/history/transactions', [UserController::class, 'history_transactions']);
Route::get('/user/invoice/{code}', [UserController::class, 'invoice']);

// Shop
Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/create', [ProductController::class, 'create']);
Route::post('/product/create', [ProductController::class, 'store']);
Route::get('/product/edit/{id}', [ProductController::class, 'edit']);
Route::post('/product/edit/{id}', [ProductController::class, 'update']);
Route::post('/product/{id}/delete', [ProductController::class, 'destroy']);
Route::get('/product/transactions', [ProductController::class, 'transactions']);
Route::get('/product/invoice/{code}', [ProductController::class, 'invoice']);
Route::get('/product/history/transactions', [ProductController::class, 'history_transactions']);
Route::get('/pending', [ProductController::class, 'pending_get']);
Route::put('/pending/{id}', [ProductController::class, 'pending_post']);

// // Bank
Route::get('/topup', [BankController::class, 'topup_get']);
Route::post('/topup', [BankController::class, 'topup_post']);
Route::get('/topup/pending', [BankController::class, 'pending_get']);
Route::post('/topup/pending/{id}', [BankController::class, 'pending_post']);
Route::get('/transactions', [BankController::class, 'transactions']);
Route::get('/withdraw/bank', [BankController::class, 'withdraw_get']);
Route::post('/withdraw/bank', [BankController::class, 'withdraw_post']);
Route::get('/bank/invoice/{code}', [BankController::class, 'invoice']);
Route::get('/bank/daily/transactions', [BankController::class, 'daily_transactions']);


// // Student
Route::get('/student/product', [StudentController::class, 'products']);
Route::post('/cart/{id}', [StudentController::class, 'addCart']);
Route::get('/student/topup', [StudentController::class, 'topup_get']);
Route::post('/student/topup', [StudentController::class, 'topup_post']);
Route::get('/student/cart', [StudentController::class, 'cart_get']);
Route::post('/student/cart', [StudentController::class, 'cart_post']);
Route::get('/student/transactions', [StudentController::class, 'transaction_get']);
Route::get('/student/past-orders', [StudentController::class, 'pastcart_get']);
Route::get('/student/cart/invoice/{code}', [StudentController::class, 'invoice']);
Route::get('/withdraw/student', [StudentController::class, 'withdraw_get']);
Route::post('/withdraw/student', [StudentController::class, 'withdraw_post']);
Route::post('/student/cart/{id}/delete', [StudentController::class, 'destroy']);