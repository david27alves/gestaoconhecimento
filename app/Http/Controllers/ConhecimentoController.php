<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Conhecimento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ConhecimentoController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request, $id) {
        //$categorias = Conhecimento::all()->sortBy('id');
        $conhecimentos = DB::table('conhecimentos')->whereIn('id_categoria', (array)$id)->get();
        return view('conhecimentoporcategoria', ['cons' => $conhecimentos]);
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
