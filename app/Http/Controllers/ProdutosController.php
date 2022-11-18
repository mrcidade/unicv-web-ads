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
            'Nome'  => 'required|min:3|max:255',
            'Email'      => 'required|email',
            'Idade' => 'required|numeric|integer',
            'Telefone' => 'required|numeric'
        ], []);

        if($validated->fails()) {
            return redirect('produtos/novo')->withErrors($validated)->withInput();
        } else {
            DB::table('produtos')->insert([
                'Nome'  => $request->Nome,
                'Email'      => $request->Email,
                'Idade' => $request->Idade,
                'Telefone' => $request->Telefone,
            ]);

            return redirect('produtos')->with('mensagem', 'Produto cadastrado.');
        }
    }

    public function edit($id)
    {
        if (! DB::table('produtos')->where('id', $id)->first()) {
            return redirect('produtos')->with('mensagem', 'Produto não encontrado.');
        }
        
        $produto = DB::table('produtos')->where('id', $id)->first();
        return view('produtos.editar', ['produto' => $produto]);
    }

    public function update(Request $request, $id)
    {
        if (! DB::table('produtos')->where('id', $id)->first()) {
            return redirect('produtos')->with('mensagem', 'Produto não encontrado.');
        }

        $validated = Validator::make($request->all(), [
            'Nome'  => 'required|min:3|max:255',
            'Email'      => 'required|email',
            'Idade' => 'required|numeric|integer',
            'Telefone' => 'required|numeric'
        ]);

        if($validated->fails()) {
            return redirect('produtos/editar/'.$id)->withErrors($validated);
        } else {
            $produto = [
                'Nome'  => $request->Nome,
                'Email'      => $request->Email,
                'Idade' => $request->Idade,
                'Telefone' => $request->Telefone,
            ];

            DB::table('produtos')->where('id', $id)->update($produto);
            return redirect('produtos')->with('mensagem', 'Produto alterado.');
        }
    }

    public function destroy($id)
    {
        if (! DB::table('produtos')->where('id', $id)->first()) {
            return redirect('produtos')->with('mensagem', 'Produto não encontrado.');
        }

        DB::table('produtos')->where('id', $id)->delete();
        return redirect('produtos')->with('mensagem', 'Produto excluído.');
    }
}
