<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProdutosController extends Controller
{
    public function index() {
        $dados = DB::table('produtos')->get();

        return view('produtos.listar', ['produtos' => $dados]);
    }

    public function show($id) {
        $produto = DB::table('produtos')->where('id', $id)->first();

        return view('produtos.detalhes', ['produto' => $produto]);
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
            DB::table('produtos')->insert([
                'descricao'  => $request->descricao,
                'preco'      => $request->preco,
                'quantidade' => $request->quantidade,
            ]);

            return redirect('produtos')->with('mensagem', 'Produto cadastrado.');
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
            return redirect('produtos')->with('mensagem', 'Produto alterado.');
        }
    }

    public function destroy($id)
    {
        return redirect('produtos')->with('mensagem', 'Produto excluído.');
    }
}
