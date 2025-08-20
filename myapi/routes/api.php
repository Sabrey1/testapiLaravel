<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/products', [ProductController::class, 'index']);       // Get all products

Route::get('/products/{id}', [ProductController::class, 'show']);   // Get single product

Route::post('/products', [ProductController::class, 'store']);      // Create product

Route::put('/products/{id}', [ProductController::class, 'update']); // Update product

Route::delete('/products/{id}', [ProductController::class, 'destroy']); // Delete product


Route::apiResource('customers', CustomerController::class);