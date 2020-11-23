<?php

namespace App\Http\Controllers;

use App\Conhecimento;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultaConhecimentoController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {

        $palavras = explode(" ", $request->titulo);
        $sql = "titulo ILIKE ";
        
        $i = 0;
        
        foreach ($palavras as $p) {

            //concatenando as string do array gerado pelo explode
            $i++;
            $sql = $sql . "%" . $p . "%";
            
            //se não for a última palavra ele adiciona o and
            if ($i < count($palavras)){
                $sql = $sql . " or ";
            }
        }
        
        $query = Conhecimento::query();
        $query->whereRaw($sql);
        $conhecimentos = $query->paginate(20);

        //return view('consultaconhecimento', ['conhecimentos' => $conhecimentos]);
        

        return $sql;
        /*if ($conhecimentos->count() > 0) {
            return view('consultaconhecimento', ['conhecimentos' => $conhecimentos]);
        } else{ 
            return 'Nada encontrado!'; 
        }*/

    }
}
