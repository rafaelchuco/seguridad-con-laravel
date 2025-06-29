<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('productos.index');
});

Route::get('/productos', [ProductoController::class, 'index'])
    ->name('productos.index');

Route::post('/productos/filtrar', [ProductoController::class, 'filtrar'])
    ->name('productos.filtrar');

Route::get('/productos/crear', [ProductoController::class, 'crear'])
    ->name('productos.crear');

Route::post('/productos', [ProductoController::class, 'guardar'])
    ->name('productos.guardar');