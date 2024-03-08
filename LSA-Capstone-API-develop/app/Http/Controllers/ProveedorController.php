<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Evaluacion_proveedor;
use App\Models\Producto;
use Illuminate\Support\Facades\Validator;
use App\Models\Proveedor;
use Freshwork\ChileanBundle\Rut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use function PHPSTORM_META\map;

class ProveedorController extends Controller
{
    public function proveedores()
    {
        $proveedores = Proveedor::where('estado', 1)->get();
        return $proveedores->toArray();
    }

    public function crear_proveedor(Request $request)
    {

        try {
            $proveedor = new Proveedor();

            $proveedor->rut = $request->rut_proveedor;
            $proveedor->nombre_empresa = $request->nombre_proveedor;
            $proveedor->contacto = $request->contacto;
            $proveedor->telefono = $request->telefono;
            $proveedor->email = $request->email;
            $proveedor->dirección = $request->direccion;
            $proveedor->giro = $request->giro;
            $proveedor->fecha_evaluacion = 'SIN REALIZAR';
            $proveedor->aprobacion = $request->aprobacion;
            $proveedor->estado = 1;

            $proveedor->save();

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
        //return $proveedor->aprobacion;


    }

    public function evaluar_proveedor(Request $request)
    {
        try {

            $evaluacion = new Evaluacion_proveedor();
            $evaluacion->valor_asignado = $request->valor_asignado;
            $evaluacion->observaciones = $request->observaciones;
            $evaluacion->fecha_evaluacion = $request->fecha_evaluacion;
            $evaluacion->rut_proveedor = $request->rut_proveedor;
            $evaluacion->rut_empleado = $request->rut_empleado;

            $evaluacion->save();

            $proveedor = Proveedor::query()
                ->where('proveedor.rut', '=', $request->rut_proveedor)
                ->update([
                    'proveedor.aprobacion' => $request->valor_asignado,
                    'proveedor.fecha_evaluacion' => $request->fecha_evaluacion
                ]);


            return $proveedor;
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

    public function actualizar_proveedor(Request $request)
    {
        $proveedor = Proveedor::query()
            ->where('proveedor.rut', '=', $request->rut_proveedor)
            ->update([
                'proveedor.contacto' =>  $request->contacto,
                'proveedor.telefono' => $request->telefono,
                'proveedor.email' => $request->email,
                'proveedor.dirección' => $request->direccion,
                'proveedor.giro' => $request->giro
            ]);

        return $proveedor;
    }


    /**
     * proveedor habilitado: 1
     * proveedor deshabilitado: 0
     */
    public function eliminar_proveedor($rut_proveedor)
    {
        if ($rut_proveedor != null) {
            $proveedor = Proveedor::query()
                ->where('proveedor.rut', '=', $rut_proveedor)
                ->update(['proveedor.estado' => 0]);

            return $proveedor;
        }
        return null;
    }


    /*     public function validar_agregar_proveedor()
    {
        return 
        [
            'rut' => 'bail|required|unique:Proveedor|cl_rut|min:8|max:12',
            'nombre_empresa' => 'required|min:3|max:255',
            'contacto' => 'required|min:3|max:255|',
            'telefono' => 'required|min:3|max:255',
            'email' => 'required|max:255',
            'direccion' => 'required|max:255',
            'giro' => 'required|max:255'            
        ];
    }

    public function validacion($parametros, $tipo_validacion)
    {
        $validacion = Validator::make($parametros, $tipo_validacion);

        if($validacion -> fails())
        {
            return response()->json(['error' => 'bad request'], 400);
        }
    }
 */
}
