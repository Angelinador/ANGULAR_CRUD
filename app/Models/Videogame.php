<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videogame extends Model
{
    use HasFactory;
    //añadimos esta propiedad la cual permitira los campos que podran contener asignacion masiva
    //protected $fillable = ['name', 'category_id'];

    //este metodo se usa para especificar que el modelo no debe de admitir el token que envia la instruccion
    //$request->all();
    protected $guarded = ['token'];
}
