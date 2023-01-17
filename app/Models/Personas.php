<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    protected $table = "personas"; //nombre de la tabla en la BD
    //campos que poueden ser alterados desde la app
    protected $fillable = ['telefono', 'nombre', 'paterno', 'materno', 'fecha_nacimiento'];
    public function telefonos()
    {
     //  Relacion uno a muchos id_persona nombre de la llave foranea en tabla telefonos
        return $this->hasMany(Telefonos::class,'id_persona');
        
    }
    
}
