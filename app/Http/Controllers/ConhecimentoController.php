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
        $conhecimentos = Conhecimento::with('categoria')->whereIn('id_categoria', (array)$id)->paginate(10);
        
        return view('conhecimentoporcategoria', compact('categs', 'CatSelecionada', 'conhecimentos'));
        
    }

    public function create() 
    {

        $categorias = Categoria::all()->sortBy('id');
        
        return view('novoconhecimento', ['categorias' => $categorias]);
    }

    public function store(Request $request) 
    {

        Conhecimento::create($request->all());

        return back()->withErrors(['success' => 'Cadastrado com sucesso!']);

       

    }

    public function show(Request $request, $id) 
    {

        $conhecimento = Conhecimento::with('categoria', 'user')->whereIn('id', (array)$id)->get();

        return view('visializarconhecimento', ['conhecimento' => $conhecimento]);
        

    }

    public function edit(Request $response, $id) 
    {

        $conhecimento = Conhecimento::with('categoria')->whereIn('id', (array)$id)->get();
        $categorias = Categoria::all()->sortBy('id');

        return view('editarconhecimento', ['conhecimento' => $conhecimento], ['categorias' => $categorias]);
        
    }

    public function update(Request $response, $id) 
    {
        Conhecimento::find($id)->update($response->all());
        return redirect('home');
    }

    public function destroy($id)
    {
        Conhecimento::find($id)->delete();
        return redirect('home');
    }

}
