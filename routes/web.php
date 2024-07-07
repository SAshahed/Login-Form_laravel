<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/* Route::get('/', function () {
    return view('welcome');
});
 */

 Route::get('/',[AuthController::class, 'index']);
 Route::get('forgot_password',[AuthController::class, 'forgot_password']);
 Route::get('register',[AuthController::class, 'register']);
 Route::post('register_post', [AuthController::class, 'RegisterPost']);
 Route::post('checkemail', [AuthController::class, 'CheckEmail']);

 
