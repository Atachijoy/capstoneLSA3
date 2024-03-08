<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    // Relación uno a muchos
    public function fields_forms(){
        return $this->hasMany('App\Models\field_form');
    }
}
