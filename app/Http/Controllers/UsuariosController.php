<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UsuariosController extends Controller
{
    public function index() {
        $usuarios = DB::table('usuarios')->get();

        return view('usuarios.listar', ['usuarios' => $usuarios]);
    }

    public function show($id) {
        $usuario = DB::table('usuarios')->where('id', $id)->first();

        return view('usuarios.detalhes', ['usuario' => $usuario]);
    }

    public function create() {
        return view('usuarios.novo');
    }

    public function store(Request $request) {
        $validated = Validator::make($request->all(), [
            'Nome'  => 'required|min:3|max:128',
            'Email' => 'required|email|min:0',
            'Idade' => 'required|integer|min:0|not_in:0',
            'Telefone' => 'required|numeric|min:0'
        ], [], ['Nome' => 'Nome', 'Email' => 'Email', 'Idade' => 'Idade', 'Telefone' => 'Telefone']);

        if($validated->fails()) {
            return redirect('usuarios/novo')->withErrors($validated)->withInput();
        } else {
            DB::table('usuarios')->insert([
                'Nome'  => $request->Nome,
                'Email' => $request->Email,
                'Idade' => $request->Idade,
                'Telefone' => $request->Telefone,
            ]);

            return redirect('usuarios')->with('mensagem', 'Usuario cadastrado.');
        }
    }

    public function edit($id)
    {
        if (! DB::table('usuarios')->where('id', $id)->first()) {
            return redirect('usuarios')->with('mensagem', 'Usuario não encontrado.');
        }
        
        $usuario = DB::table('usuarios')->where('id', $id)->first();
        return view('usuarios.editar', ['usuario' => $usuario]);
    }

    public function update(Request $request, $id)
    {
        if (! DB::table('usuarios')->where('id', $id)->first()) {
            return redirect('usuarios')->with('mensagem', 'Usuario não encontrado.');
        }

        $validated = Validator::make($request->all(), [
            'Nome'  => 'required|min:3|max:120',
            'Email' => 'required|email|min:0',
            'Idade' => 'required|integer|min:0|not_in:0',
            'Telefone' => 'required|numeric|min:0'
        ]);

        if($validated->fails()) {
            return redirect('usuarios/editar/'.$id)->withErrors($validated);
        } else {
            $usuario = [
                'Nome'  => $request->Nome,
                'Email' => $request->Email,
                'Idade' => $request->Idade,
                'Telefone' => $request->Telefone,
            ];

            DB::table('usuarios')->where('id', $id)->update($usuario);
            return redirect('usuarios')->with('mensagem', 'Usuario alterado.');
        }
    }

    public function destroy($id)
    {
        if (! DB::table('usuarios')->where('id', $id)->first()) {
            return redirect('usuarios')->with('mensagem', 'Usuario não encontrado.');
        }

        DB::table('usuarios')->where('id', $id)->delete();
        return redirect('usuarios')->with('mensagem', 'Usuario excluído.');
    }
}