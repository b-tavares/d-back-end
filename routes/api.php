<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ProductController;

Route::group([
    'middleware' => 'jwt.verify',
    'prefix' => 'auth'
], function ()
{
    Route::post('login', [ApiController::class, 'login']);
}    
);