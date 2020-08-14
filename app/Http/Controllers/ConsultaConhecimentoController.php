<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsultaConhecimentoController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        
    }
}
