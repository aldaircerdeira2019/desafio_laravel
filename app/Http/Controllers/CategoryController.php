<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipo;
use App\Models\Marca;
use App\Models\Modelo;

class CategoryController extends Controller
{
    public function findAllTipos(){
        $tipo = Tipo::all();
        return $tipo;
    }

    public function findByTipoMarcas(Request $request){
        $tipo = Tipo::find($request->get('tipo_id'));
        if($tipo){
            $marcas = $tipo->marcas;
            return $marcas;
        }
        else
        return [];

    }
    public function findByMarcaModelos(Request $request){
        $marca = Marca::find($request->get('marca_id'));
        if($marca){
            $modelos = $marca->modelos;
            return $modelos ;
        }
        else
        return [];

    }
    public function findByModeloVersoes(Request $request){
        $modelo = Modelo::find($request->get('modelo_id'));
        if($modelo){
            $versoes = $modelo->versoes;
            return $versoes ;
        }
        else
        return [];

    }

}
