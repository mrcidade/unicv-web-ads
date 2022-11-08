<?php

use Illuminate\Http\Request;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

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
Route::get('usuarios', [UsuariosController::class, 'index']);
Route::post('usuarios/salvar', [UsuariosController::class, 'store']);
Route::get('usuarios/{id}', [UsuariosController::class, 'show']);

// Route::apiResource('usuarios', UsuariosController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
