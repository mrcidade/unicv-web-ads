<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
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
        $users = DB::table('usuarios')->get();

        return view('users', ['usuarios' => $users]);
    }
}
