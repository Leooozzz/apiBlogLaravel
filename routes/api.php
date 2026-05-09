<?php

use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/auth/singup',[AuthController::class , 'singup']);
Route::post('/auth/singin',[AuthController::class, 'singin']);
Route::post('/auth/verify',[AuthController::class, 'verify'])->middleware('auth:sanctum');
