<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Conhecimento;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categorias = Categoria::all()->sortBy('id');
        $conhecimentos = Conhecimento::with('categoria')->get();
        
        return view('home', ['categorias' => $categorias], ['conhecimentos' => $conhecimentos]);

    }
}
