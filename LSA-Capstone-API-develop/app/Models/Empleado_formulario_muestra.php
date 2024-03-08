<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado_formulario_muestra extends Model
{
    use HasFactory;

    protected $table = 'empleado_formulario_muestra';

    public function empleado(){

        return $this->belongsTo('App\Models\Empleado');
    }

    public function muestra(){

        return $this->belongsTo('App\Models\Muestra');
    }

    public function formulario(){

        return $this->belongsTo('App\Models\Form');
    }
}
