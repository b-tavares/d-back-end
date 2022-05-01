<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\AdressController;

Route::group([
    'middleware' => 'jwt.verify',
    'prefix' => 'auth'
], function ()
{
    Route::post('signup', [ApiController::class, 'register']);
    Route::post('login', [ApiController::class, 'login']);
    Route::post('logout', [ApiController::class, 'logout']);

    Route::post('clients', [ClientController::class, 'index']);
    Route::post('client/new', [ClientController::class, 'store']);
    Route::post('client/{id}', [ClientController::class, 'show']);
    Route::put('client/edit/{id}', [ClientController::class, 'update']);
    Route::post('client/delete/{id}', [ClientController::class, 'destroy']);
    
    Route::post('products', [ProductController::class, 'index']);
    Route::post('product/new', [ProductController::class, 'store']);
    Route::post('product/{id}', [ProductController::class, 'show']);
    Route::put('product/edit/{id}', [ProductController::class, 'update']);
    Route::post('product/erase/{id}', [ProductController::class, 'destroy']);
    Route::post('product/restore/{id}', [ProductController::class, 'restore']);
    Route::post('product/delete/{id}', [ProductController::class, 'forceDelete']);
    
    Route::post('sale', [SaleController::class, 'store']);
    
    Route::post('adress/new', [AdressController::class, 'store']);
    Route::put('adress/edit/{id}', [AdressController::class, 'update']);
});