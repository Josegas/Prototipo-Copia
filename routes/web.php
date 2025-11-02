<?php

use App\Http\Controllers\TasController;
use Illuminate\Support\Facades\Route;

Route::get('/',[TasController::class,'tas_inicio']) -> name('tas_inicio');
Route::get('/login',[TasController::class,'tas_loginView']) -> name('tas_loginView');
Route::post('/home',[TasController::class,'tas_inicioSesion']) -> name('tas_inicioSesion');