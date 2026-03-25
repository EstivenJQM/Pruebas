<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\ComponenteController;
use App\Http\Controllers\LineaController;
use App\Http\Controllers\ActividadController;

Route::get('/', function () {
    return view('welcome');
});

// CRUD
Route::resource('areas',       AreaController::class);
Route::resource('componentes', ComponenteController::class);
Route::resource('lineas',      LineaController::class);
Route::resource('actividades', ActividadController::class);

// Dropdowns dinámicos
Route::get('/eventos', [EventoController::class, 'index']);
Route::get('/api/componentes/{id}', [EventoController::class, 'getComponentes']);
Route::get('/api/lineas/{id}',      [EventoController::class, 'getLineas']);
Route::get('/api/actividades/{id}', [EventoController::class, 'getActividades']);

/*
// NUEVA RUTA
Route::get('/eventos', [EventoController::class, 'index']);

// RUTAS PARA FILTROS
Route::get('/componentes/{id}', [EventoController::class, 'getComponentes']);
Route::get('/lineas/{id}', [EventoController::class, 'getLineas']);
Route::get('/actividades/{id}', [EventoController::class, 'getActividades']);*/