<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Conhecimento;
use Illuminate\Http\Request;

class ConhecimentoController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $categorias = Categoria::all()->sortBy('id');
        return view('novoconhecimento', ['categorias' => $categorias]);
    }

    public function store(Request $request) {

        Conhecimento::create($request->all());
        return back()->withErrors(['success' => 'Cadastrado com sucesso!']);
    }
}
