<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Equipo;
use App\Models\Producto;
use App\Models\producto_proveedor;
use App\Models\Proveedor;
use App\Models\Reactivo;
use Carbon\Carbon;
use Dotenv\Store\File\Reader;
use Hamcrest\Core\HasToString;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use PhpParser\Node\Expr\Cast\String_;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    /**
     * existen 4 tipos de productos
     * prodcuto tipo 0: material normal
     * producto tipo 1: material de aseo
     * producto tipo 2: equipo
     * producto tipo 3: reactivo
     * producto tipo 4: producto eliminado
     */
    public function producto($id_producto)
    {
        if ($id_producto != null) {
            $producto = Producto::query()
                ->where('producto.id', '=', $id_producto)
                ->get()->toArray();

            return $producto;
        }
        return null;
    }
    public function productos()
    {
        $productos = Producto::query()
            ->where('producto.tipo', '0')
            ->get()->toArray();
        return $productos;
    }

    public function productos_aseo()
    {
        $productos = Producto::query()
            ->where('producto.tipo', '1')
            ->get()->toArray();
        return $productos;
    }

    public function reactivos()
    {
        $productos = Producto::query()
            ->join('reactivo', 'reactivo.id_producto', 'producto.id')
            ->select(
                'producto.id',
                'producto.codigo',
                'producto.nombre',
                'reactivo.formula',
                'producto.marca',
                'producto.unidad',
                'producto.cantidad',
                'producto.ingresos',
                'producto.ubicacion',
                'producto.egresos',
                'producto.saldo',
                'reactivo.peligrosidad',
                'reactivo.clase',
                'reactivo.riesgo_secundario',
                'reactivo.grupo_embalaje',
                'reactivo.disposiciones',
                'reactivo.n_guia'
            )
            ->where('producto.tipo', '=', '3')
            ->get()->toArray();

        return $productos;
    }

    public function equipos()
    {
        $productos = Producto::query()
            ->join('equipo', 'equipo.id_producto', 'producto.id')
            ->select(
                'producto.id',
                'producto.codigo',
                'producto.nombre',
                'producto.marca',
                'producto.cantidad',
                'producto.ingresos',
                'producto.egresos',
                'producto.saldo',
                'producto.ubicacion',
                'equipo.valor',
                'equipo.fecha_ingreso',
                'equipo.fecha_egreso'
            )->where('producto.tipo', '=', '2')
            ->get()->toArray();

        return $productos;
    }

    public function crear_producto(Request $request)
    {

        try {
            $producto = new Producto();

            $producto->codigo = "";
            $producto->nombre = $request->nombre;
            $producto->marca = "";
            $producto->ingresos = 0;
            $producto->egresos = 0;
            $producto->capacidad = $request->capacidad;
            $producto->unidad = $request->unidad;
            $producto->cantidad = $request->cantidad;
            $producto->saldo = $producto->cantidad;
            $producto->ubicacion = $request->ubicacion;
            $producto->lote = "";
            $producto->rut_proveedor = $request->proveedor;
            $producto->tipo = "0";

            $producto->save();

            $provee_producto = new producto_proveedor();

            $provee_producto->id_producto = $producto->id;
            $provee_producto->rut_proveedor = $request->proveedor;

            $provee_producto->save();

            /*             $producto->proveedor()->attach($proveedor);

            if($proveedor != null)
            {
                $proveedor->producto()->attach($producto);
                $producto->save();
            }
 */


            return $request;
        } catch (QueryException $e) {
            // Captura cualquier excepción relacionada con la consulta a la base de datos
            // Muestra o registra el mensaje de error
            return $e->getMessage();
        } catch (\Exception $e) {
            // Captura otras excepciones generales
            // Muestra o registra el mensaje de error
            return $e->getMessage();
        }
        /*         $proveedor = Proveedor::find($request->proveedor);

        if($proveedor != null){
            return 'no se encontro el proveedor';
        }

        $proveedor->producto()->attach($producto); */
    }

    public function crear_material_aseo(Request $request)
    {
        $producto = new Producto();

        $producto->codigo = $request->codigo;
        $producto->nombre = $request->nombre;
        $producto->cantidad = $request->cantidad;
        $producto->marca = $request->marca;
        $producto->ubicacion = $request->ubicacion;
        $producto->ingresos = 0;
        $producto->egresos = 0;
        $producto->saldo = 0;
        $producto->capacidad = "";
        $producto->unidad = "";
        $producto->lote = "";
        $producto->rut_proveedor = $request->proveedor;
        $producto->tipo = "1";

        $producto->save();

        $provee_producto = new producto_proveedor();

        $provee_producto->id_producto = $producto->id;
        $provee_producto->rut_proveedor = $request->proveedor;

        $provee_producto->save();

        return $request;
    }

    public function crear_equipo(Request $request)
    {

        try {
            $producto = new Producto();

            $producto->codigo = $request->codigo;
            $producto->nombre = $request->nombre;
            $producto->cantidad = $request->cantidad;
            $producto->marca = $request->marca;
            $producto->ubicacion = $request->ubicacion;
            $producto->ingresos = 0;
            $producto->egresos = 0;
            $producto->saldo = 0;
            $producto->capacidad = "";
            $producto->unidad = "";
            $producto->lote = "";
            $producto->rut_proveedor = $request->proveedor;
            $producto->tipo = "2";


            $producto->save();

            $equipo = new Equipo();
            $equipo->id_producto = $producto->id;

            $equipo->valor = $request->valor;
            $equipo->fecha_ingreso = Carbon::now()->toDateString();
            $equipo->fecha_egreso = "";
            $equipo->save();


            $provee_producto = new producto_proveedor();

            $provee_producto->id_producto = $producto->id;
            $provee_producto->rut_proveedor = $request->proveedor;

            $provee_producto->save();


            return $request;
        } catch (QueryException $e) {
            // Captura cualquier excepción relacionada con la consulta a la base de datos
            // Muestra o registra el mensaje de error
            return $e->getMessage();
        } catch (\Exception $e) {
            // Captura otras excepciones generales
            // Muestra o registra el mensaje de error
            return $e->getMessage();
        }
    }

    public function crear_reactivo(Request $request)
    {
        try {
            $producto = new Producto();

            $producto->codigo = $request->codigo;
            $producto->nombre = $request->nombre;
            $producto->cantidad = $request->cantidad;
            $producto->marca = $request->marca;
            $producto->ubicacion = $request->ubicacion;
            $producto->ingresos = 0;
            $producto->egresos = 0;
            $producto->saldo = 0;
            $producto->capacidad = "";
            $producto->unidad = $request->unidad;
            $producto->lote = "";
            $producto->rut_proveedor = $request->proveedor;
            $producto->tipo = "3";

            $producto->save();


            $reactivo = new Reactivo();

            $reactivo->formula = $request->formula;
            $reactivo->peligrosidad = $request->peligrosidad;
            $reactivo->clase = $request->clase;
            $reactivo->riesgo_secundario = $request->riesgo;
            $reactivo->grupo_embalaje = $request->grupo;
            $reactivo->n_guia = $request->nguia;
            $reactivo->id_producto = $producto->id;
            $reactivo->disposiciones = 0;

            $reactivo->save();

            $provee_producto = new producto_proveedor();
            $provee_producto->id_producto = $producto->id;
            $provee_producto->rut_proveedor = $request->proveedor;
            $provee_producto->save();

            return $reactivo;
        } catch (QueryException $e) {
            // Captura cualquier excepción relacionada con la consulta a la base de datos
            // Muestra o registra el mensaje de error
            return $e->getMessage();
        } catch (\Exception $e) {
            // Captura otras excepciones generales
            // Muestra o registra el mensaje de error
            return $e->getMessage();
        }
    }


    public function actualizar_ingreso_egreso(Request $request)
    {
        try {
            if ($request->id_producto != null) {
                $producto = Producto::query()
                    ->where('producto.id', '=', $request->id_producto)
                    ->update([
                        'producto.ingresos' => $request->ingreso,
                        'producto.egresos' => $request->egreso,
                      /*   'producto.ingresos' => DB::raw('producto.ingresos + ' . $request->ingreso),
                        'producto.egresos' => DB::raw('producto.egresos + ' . $request->egreso), */
                        'producto.saldo' => DB::raw('producto.cantidad + producto.ingresos - producto.egresos')
                    ]);

                if($producto != null){
                    return 'funciona';
                } else{
                    return 'no funciona';
                }
            }

            return null;
        } catch (QueryException $e) {
            // Captura cualquier excepción relacionada con la consulta a la base de datos
            // Muestra o registra el mensaje de error
            return $e->getMessage();
        } catch (\Exception $e) {
            // Captura otras excepciones generales
            // Muestra o registra el mensaje de error
            return $e->getMessage();
        }
    }

    public function eliminar_producto($id_producto)
    {
        if ($id_producto != null) {
            $producto = Producto::query()
                ->where('producto.id', '=', $id_producto)
                ->update(['producto.tipo' => 4]);

            return $producto;
        }

        return null;
    }

    public function actualizar_material(Request $request)
    {
        if($request != null)
        {
            $producto = Producto::query()
            ->where('producto.id', '=', $request->material_id)
            ->update(['producto.nombre' => $request->nombre,
            'producto.capacidad' => strval($request->capacidad),
            'producto.unidad' => $request->unidad,
            'producto.cantidad' => $request->cantidad,
            'producto.ubicacion' => $request->ubicacion,
            'producto.saldo' => DB::raw('producto.cantidad + producto.ingresos - producto.egresos')]);

            return $producto;
        }

            return null;
    }

    public function actualizar_reactivo(Request $request)
    {
        if($request != null)
        {
            $producto = Producto::query()
            ->where('producto.id', '=', $request->material_id)
            ->update(['producto.nombre' => $request->nombre,
            'producto.codigo' => $request->codigo,
            'producto.cantidad' => $request->cantidad,
            'producto.ubicacion' => $request->ubicacion,
            'producto.unidad' => $request->unidad,
            'producto.marca' => $request->marca,]);
            
            $reactivo = Reactivo::query()
            ->where('reactivo.id_producto', '=', $request->material_id)
            ->update(['reactivo.formula' => $request->formula,
            'reactivo.peligrosidad' => $request->peligrosidad,
            'reactivo.clase' => $request->clase,
            'reactivo.riesgo_secundario' => $request->riesgo,
            'reactivo.grupo_embalaje' => $request->embalaje,
            'reactivo.disposiciones' => $request->disposicion,
            'reactivo.n_guia' => $request->guia]);
        }
    }



}
