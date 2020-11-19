<?php

namespace App\Http\Controllers;

use App\Conhecimento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ConhecimentoShareController extends Controller
{
    public function index($hash)
    {
        // {id: '6', hash: '1679091c5a880faf6fb5e6087eb1b2dc'}
        $rexi = md5($hash);

        $conhecimento = Conhecimento::with('categoria', 'user')->whereIn('id', (array)$hash)->get();

        //return view('viewconhecimento', compact('conhecimento'));
        return $rexi;
    }
}
