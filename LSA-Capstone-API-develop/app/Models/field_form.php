<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class field_form extends Model
{
    use HasFactory;

    protected $table = 'field_form';

    //Relación uno a muchos inversa

    public function form(){
        return $this->belongsTo('App\Models\Form');
    }

    public function field(){
        return $this->belongsTo('App\Models\Field');
    }
}
