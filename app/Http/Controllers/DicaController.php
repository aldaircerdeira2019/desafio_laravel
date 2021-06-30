<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Dica;

class DicaController extends Controller
{
    public function index(){
        $user = Auth::user();
        $dicas = $user->dicas()->orderBy('id', 'desc')->paginate(20);
        return $dicas;
    }
    public function store(Request $request){
        $user = Auth::user();
        $request->validate([
            'title'         => ['required'],
            'descri'        => ['required'],
            'modelo_id'     => ['required'],
        ]);
        $request['user_id'] = $user->id;
        $dica = Dica::create($request->all());
        return $dica;
    }
    public function update(Request $request, $id){
        $dica = Dica::find($id);
        $request->validate([
            'title'         => ['required'],
            'descri'        => ['required'],
            'modelo_id'     => ['required'],
        ]);
        $request['user_id'] = $user->id;
        $dica->update($request->all());
        return $dica;
    }
    public function destroy($id){
        $dica = Dica::find($id);
        $dica->delete();
        return 'ok';
    }
}
