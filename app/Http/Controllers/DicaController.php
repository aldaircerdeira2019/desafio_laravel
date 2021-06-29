<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Dica;

class DicaController extends Controller
{
    public function index(){
        $user = User::find(1);
        $dicas = $user->dicas;
        return $dicas;
    }
    public function store(Request $request){
        $user = User::find(1);

        $request->validate([
            'title'         => ['required'],
            'descri'        => ['required'],
            'modelo_id'     => ['required'],
        ]);
        $dica = Dica::create($request->all());
        return $dica;
    }
    public function update(Request $request, $id){
        $user = User::find(1);
        $dica = Dica::find($id);
        $request->validate([
            'title'         => ['required'],
            'descri'        => ['required'],
            'modelo_id'     => ['required'],
        ]);
        $dica->update($request->all());
        return $dica;
    }
    public function destroy($id){
        $dica = Dica::find($id);
        $dica->delete();
        return 'ok';
    }
}
