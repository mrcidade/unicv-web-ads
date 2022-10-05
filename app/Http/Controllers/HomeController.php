<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $nome = 'José';
        $sobrenome = 'da Silva';

        $total = 5;
        return view('home', [
            'nome' => $nome,
            'sobrenome' => $sobrenome,
            'numero' => $total
        ]);
    }

    public function users() {
        $users = [
            ['nome' => 'José da Silva', 'idade'  => 64, 'cidade' => 'Maringá'],
            ['nome' => 'Maria Joana', 'idade' => 26, 'cidade' => 'Londrina'],
            ['nome' => 'Ana Carolina', 'idade' => 35, 'cidade' => 'Curitiba'],
            ['nome' => 'Ana Carolina', 'idade' => 35, 'cidade' => 'Curitiba']
        ];

        return view('users', ['usuarios' => $users]);
    }
}
