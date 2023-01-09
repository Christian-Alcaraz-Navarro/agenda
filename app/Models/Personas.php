<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    
    public function telefonos()
    {
     //user profile es tabla padre y user id nombre del campo de llave foranea
        return $this->hasMany(Telefonos::class,'id_persona');
        
    }
    protected $fillable = ['telefono'];
}
