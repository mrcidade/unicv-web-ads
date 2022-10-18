<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutosController;
use Illuminate\Support\Facades\Route;

// CRUD
Route::get('produtos', [ProdutosController::class, 'index']);
Route::get('produtos/novo', [ProdutosController::class, 'create']);
Route::post('produtos/salvar', [ProdutosController::class, 'store']);
Route::get('produtos/editar/{id}', [ProdutosController::class, 'edit']);
Route::post('produtos/gravar/{id}', [ProdutosController::class, 'update']);
Route::get('produtos/{id}', [ProdutosController::class, 'show']);


Route::get('home', [HomeController::class, 'index']);
Route::get('users', [HomeController::class, 'users']);

Route::get('/', function () {
    return view('welcome');
});
