<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function index() {
        $dados = ['produtos' => [
                ['codigo' => '1', 'descricao' => 'Mouse Microsoft 2000', 'preco' => '125.90'],
                ['codigo' => '2', 'descricao' => 'Teclado Razer Cyclosa', 'preco' => '189.75'],
                ['codigo' => '3', 'descricao' => 'Headphone HyperX', 'preco' => '468.23'],
                ['codigo' => '4', 'descricao' => 'Mousepad Gamind Speed', 'preco' => '98.62']
            ]
        ];

        return view('produtos.listar', $dados);
    }

    public function show($id) {
        $produto = [
            'codigo' => $id,
            'descricao' => 'Mouse Microsoft 2000',
            'preco' => '125.90',
            'quantidade' => 326
        ];
        return view('produtos.detalhes', $produto);
    }

    public function create() {
        return view('produtos.novo');
    }

    public function store(Request $request) {
        print_r($request->all());
    }
}
