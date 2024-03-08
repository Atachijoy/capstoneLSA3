<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'producto';
    
    protected $primaryKey = 'id';

/*     protected $timestamps = false;
 */
/*     protected $fillable = 
    [
        'id',
        'codigo_producto',
        'nombre',
        'marca',
        'ingresos',
        'egresos',
        'cantidad',
        'ubicacion',
        'lote'
    ];
 */
    //Relacion N-N producto-proveedor
    public function proveedor()
    {
        return $this->belongsToMany(Proveedor::class, 'producto_proveedor');
    }

}
