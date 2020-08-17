<?php

namespace App\Http\Controllers;

use App\Categoria;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        
        return view('novacategoria'); 
    }

    public function store(Request $request) {
        Categoria::create($request->all());

        return back()->withErrors(['success' => 'Cadastrado com sucesso!']);
    }
}
