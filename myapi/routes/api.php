<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceDetailController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuTypeController;
use App\Http\Controllers\AppUserController;
use App\Http\Controllers\AppUserPermissionController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/products', [ProductController::class, 'index']);       // Get all products

Route::get('/products/{id}', [ProductController::class, 'show']);   // Get single product

Route::post('/products', [ProductController::class, 'store']);      // Create product

Route::put('/products/{id}', [ProductController::class, 'update']); // Update product

Route::delete('/products/{id}', [ProductController::class, 'destroy']); // Delete product

Route::get('/customers', [CustomersController::class, 'index']);
Route::get('/customers/{id}', [CustomersController::class, 'show']);
Route::post('/customers', [CustomersController::class, 'store']);
Route::put('/customers/{id}', [CustomersController::class, 'update']);
Route::delete('/customers/{id}', [CustomersController::class, 'destroy']);

Route::apiResource('invoices', InvoiceController::class);

Route::apiResource('invoice-details', InvoiceDetailController::class);

Route::apiResource('menus', MenuController::class);

Route::apiResource('menu-types', MenuTypeController::class);

Route::apiResource('app-users', AppUserController::class);

Route::apiResource('app-user-permissions', AppUserPermissionController::class);
