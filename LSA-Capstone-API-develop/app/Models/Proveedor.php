<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedor';
    
    protected $primaryKey = 'rut';

/*     public $timestamps = false;

    protected  =
    [
        'rut',
        'nombre_empresa',
        'contacto',
        'telefono',
        'email',
        'direccion',
        'giro',
        'fecha_evaluacion',
        'aprobacion',
 *//*         'codigo_producto'
 */    
//];

    //representa la relacion N-N con Producto
     public function producto() 
     { 
         return $this->belongsToMany(Producto::class, 'producto_proveedor');       
     } 
}
