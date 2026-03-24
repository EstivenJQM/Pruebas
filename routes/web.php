<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;

// Ruta principal (puedes dejarla o cambiarla)
Route::get('/', function () {
    return view('welcome');
});

// NUEVA RUTA
Route::get('/eventos', [EventoController::class, 'index']);

// RUTAS PARA FILTROS
Route::get('/componentes/{id}', [EventoController::class, 'getComponentes']);
Route::get('/lineas/{id}', [EventoController::class, 'getLineas']);
Route::get('/actividades/{id}', [EventoController::class, 'getActividades']);