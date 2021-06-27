<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dica;

class HomeController extends Controller
{
    public function index(Request $request, Dica $dica){
        $dicas = $dica->search($request->all());
        return $dicas; 
    }
}
