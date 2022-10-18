<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $validated = Validator::make($request->all(), [
            'descricao'  => 'required|min:3|max:255',
            'preco'      => 'required|numeric',
            'quantidade' => 'required|numeric'
        ], [], [
            'descricao' => 'descrição do produto',
            'preco' => 'preço'
        ]);

        if($validated->fails()) {
            return redirect('produtos/novo')->withErrors($validated)->withInput();
        } else {
            return redirect('produtos');
        }
    }

    public function edit($id)
    {
        $produto = [
            'id' => '1', 
            'descricao' => 'Mouse Microsoft 2000', 
            'preco' => '125.90',
            'quantidade' => 35
        ];

        return view('produtos.editar', $produto);
    }

    public function update(Request $request, $id)
    {
        $validated = Validator::make($request->all(), [
            'descricao'  => 'required|min:3|max:255',
            'preco'      => 'required|numeric',
            'quantidade' => 'required|numeric'
        ]);

        if($validated->fails()) {
            return redirect('produtos/editar/'.$id)->withErrors($validated);
        } else {
            return redirect('produtos');
        }
    }
}
