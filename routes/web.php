<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function(){
    return view('main');
});
Route::post('/users', [UserController::class, 'search']);
Route::post('/add', [UserController::class, 'addUser']);
Route::get('/getAllUsers', [UserController::class, 'getAllUsers']);
Route::delete('/deleteUserById/{id}', [UserController::class, 'deleteUserById']);