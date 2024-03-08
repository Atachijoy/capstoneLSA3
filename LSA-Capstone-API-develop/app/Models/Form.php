<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    public function muestra(){
        return $this->belongsTo('App\Models\Muestra','RUM_muestra','RUM');
    }

    public function fields_forms(){
        return $this->hasMany('App\Models\field_form');
    }

    public function tecnicas(){
        return $this->hasMany('App\Models\tecnicas');
    }

    public function empleado_formulario_muestra(){
        return $this->hasMany('App\Models\Empleado_formulario_muestra');
    }
}
