<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dica extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'descri',
        'modelo_id',
        'user_id',
        'versao_id'
    ];

    public function search(array $request)
    {
        $result = $this
        ->leftJoin('modelos', 'dicas.modelo_id', '=', 'modelos.id')
        ->leftJoin('marcas', 'modelos.marca_id', '=', 'marcas.id')
        ->leftJoin('tipos', 'marcas.tipo_id', '=', 'tipos.id')
        ->select('tipos.id AS tipo_id','marcas.id AS marca_id','dicas.*')
        ->where(function ($query) use($request){
            if(isset($request['tipo_id']))
            {
                $query->Where('tipo_id', $request['tipo_id']);
            } 
            if(isset($request['marca_id']))
            {
                $query->Where('marca_id', $request['marca_id']);
            }
            if(isset($request['modelo_id']))
            {
                $query->Where('modelo_id', $request['modelo_id']);
            }
            if(isset($request['modelo_id']))
            {
                $query->Where('modelo_id', $request['modelo_id']);
            }
            if(isset($request['versao_id']))
            {
                $query->Where('versao_id', $request['versao_id']);
            }
        })

        ->with('modelo' , 'marca')
        ->paginate(20);
        return $result;
    }

    public function modelo()
    {
        return $this->belongsTo(Modelo::class);
    }

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }
}
