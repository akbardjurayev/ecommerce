<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MeasureController;
use App\Http\Controllers\BrendController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\PartitionController;
use App\Http\Controllers\RegisterController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::middleware('auth:sanctum')->get('test', function(){
    return 'test authdan o\'tdi';
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

//register
Route::post('register', [RegisterController::class, 'store']);

//category
Route::post('category', [CategoryController::class, 'store']);
Route::get('categories/{id}', [CategoryController::class, 'show']);
Route::get('categories', [CategoryController::class, 'index']);
Route::put('category/{id}', [CategoryController::class, 'update']);

//product
Route::post('product/create', [ProductController::class, 'store']);

//measure
Route::post('measure/create', [MeasureController::class, 'store']);
Route::get('measure/{id}', [MeasureController::class, 'show']);
Route::get('measures', [MeasureController::class, 'index']);
Route::put('measure/{id}', [MeasureController::class, 'update']);

//brend
Route::post('brend', [BrendController::class, 'store']);
Route::get('brend/{id}', [BrendController::class, 'show']);
Route::get('brend', [BrendController::class, 'index']);
Route::delete('brend/{id}', [BrendController::class, 'destroy']);
Route::put('brend/{id}', [BrendController::class, 'update']);

//package
Route::post('package', [PackageController::class, 'store']);

//sale
Route::post('sale', [SaleController::class, 'store']);

//partition
Route::post('partition', [PartitionController::class, 'store']);
Route::get('products', [PartitionController::class, 'index']);
