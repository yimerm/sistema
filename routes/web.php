<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts/app');
});

Route::resource('user','usuariosControler');
Route::resource('clientes','clienteControler');
Route::resource('productos','productosControler');
Route::resource('categoria','categoriaControler');
Route::resource('proveedor','proveedorControler');
Route::resource('entradafactura','factEntradaControler');

  