<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Conhecimento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ConhecimentoController extends Controller
{

    public function __construct() 
    {

        $this->middleware('auth');

    }

    public function index(Request $request, $id) 
    {

        $categs = Categoria::all()->sortBy('id');
        $CatSelecionada = DB::table('categorias')->whereIn('id', (array)$id)->get();
        $conhecimentos = Conhecimento::with('categoria')->whereIn('id_categoria', (array)$id)->get();
        
        return view('conhecimentoporcategoria', ['categs' => $categs], ['cons' => $conhecimentos], ['CatSelec' => $CatSelecionada]);

    }

    public function create() 
    {

        $categorias = Categoria::all()->sortBy('id');
        
        return view('novoconhecimento', ['categorias' => $categorias]);
    }

    public function store(Request $request) 
    {

        //Conhecimento::create($request->all());

        $hashanexo = $request->anexos;
        
        //return back()->withErrors(['success' => 'Cadastrado com sucesso!']);

        return $request->anexos; 
    }

    public function show(Request $request, $id) 
    {

        $conhecimento = Conhecimento::with('categoria', 'user')->whereIn('id', (array)$id)->get();
        //return $conhecimento;
        return view('visializarconhecimento', ['conhecimento' => $conhecimento]);

    }

    public function edit(Request $response, $id) 
    {

        $conhecimento = Conhecimento::with('categoria')->whereIn('id', (array)$id)->get();
        $categoria = $conhecimento[0]->categoria->descricao;
 
        return view('editarconhecimento', ['conhecimento' => $conhecimento], ['categoria' => $categoria]);
    }
}
