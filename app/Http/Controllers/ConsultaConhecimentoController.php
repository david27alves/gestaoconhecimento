<?php

namespace App\Http\Controllers;

use App\Conhecimento;

use Illuminate\Http\Request;

class ConsultaConhecimentoController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {

        $query = Conhecimento::query();
        $query->where('titulo', 'LIKE', '%'.$request->titulo.'%');
        $conhecimentos = $query->paginate();

        //return view('consultaconhecimento', ['conhecimentos' => $conhecimentos]);
        
        if ($conhecimentos->count() > 0) {
            return view('consultaconhecimento', ['conhecimentos' => $conhecimentos]);
        } else{ 
            return 'Nada encontrado!'; 
        }
    }
}
