<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use App\Models\Articulo;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('/articulos', [ArticuloController::class, 'index']);
Route::get('/compras', [ComprasController::class, 'index']);
Route::get('/ventas', [VentasController::class, 'index']);

Route::get('/compras/compra/{fecha}', [ComprasController::class, 'consultar']);
Route::get('/ventas/venta/{fecha}', [VentasController::class, 'consultar']);

Route::post('/compras', [ComprasController::class, 'agregarCompra']);

Route::post('/login', [UserController::class, 'login']);
Route::get('/user/all', [UserController::class, 'listAll']);


