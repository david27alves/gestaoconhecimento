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
        $categorias = Conhecimento::all()->sortBy('id');
        return $categorias;
    }

    public function create() {
        $categorias = Categoria::all()->sortBy('id');
        return view('novoconhecimento', ['categorias' => $categorias]);
    }

    public function store(Request $request) {

        Conhecimento::create($request->all());
        return back()->withErrors(['success' => 'Cadastrado com sucesso!']);
    }

    public function show(Request $request, $id) {
        $conhecimento = Conhecimento::find($id);
        return view('visializarconhecimento', ['conhecimento' => $conhecimento]);
    }

    public function edit(Request $response, $id) {
        $conhecimento = Conhecimento::find($id);
        $categoria = $conhecimento->id_categoria;
        return view('editarconhecimento', ['conhecimento' => $conhecimento], ['categoria' => $categoria]);
    }
}
