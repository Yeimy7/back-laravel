<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VehiculoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::resource('clientes',ClienteController::class)
->only(['index','show','store','update','destroy']);

Route::resource('vehiculos',VehiculoController::class)
->only(['index','show','store','update','destroy']);