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
}
