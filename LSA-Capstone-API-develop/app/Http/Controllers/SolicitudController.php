<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Producto;
use App\Models\Solicitante;
use App\Models\Solicitud;
use App\Models\Solicitud_compra;
use App\Models\Solicitud_empleado;
use App\Models\Solicitud_material;
use Carbon\Carbon;
use Doctrine\DBAL\Query;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;

class SolicitudController extends Controller
{
    /**
     * 
     * ACEPTADO: solicitud aceptada por jefa de laboratorio 
     * ACEPTADO_1: solicitud aceptada por encargado
     */
    public function solicitudes()
    {
    }

    public function obtener_areas()
    {
        try {
            $areas = Area::all();
            return $areas->toArray();
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

    public function solicitudes_materiales()
    {
        try {
            $solicitud_material = Solicitud::query()
                ->join('solicitud_material', 'solicitud_material.id_solicitud', '=', 'solicitud.id')
                ->join('solicitud_empleado', 'solicitud_empleado.id_solicitud', '=', 'solicitud.id')
                ->join('empleado', 'empleado.rut_empleado', '=', 'solicitud_empleado.rut_empleado')
                ->join('area', 'area.id_area', '=', 'solicitud.area')
                ->select(
                    'solicitud.id',
                    'solicitud.nombre_producto',
                    'solicitud.cantidad',
                    'solicitud.unidad',
                    'solicitud.fecha_solicitud',
                    'empleado.nombre',
                    'empleado.apellido',
                    'area.nombre_area'
                )->where('solicitud.validacion', '=', 'ENVIADO')
                ->get()->toArray();

            return $solicitud_material;
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

    public function solicitudes_materiales_aceptadas()
    {
        try {
            $solicitud_material = Solicitud::query()
                ->join('solicitud_material', 'solicitud_material.id_solicitud', '=', 'solicitud.id')
                ->join('solicitud_empleado', 'solicitud_empleado.id_solicitud', '=', 'solicitud.id')
                ->join('empleado', 'empleado.rut_empleado', '=', 'solicitud_empleado.rut_empleado')
                ->join('area', 'area.id_area', '=', 'solicitud.area')
                ->join('producto', 'producto.id', '=', 'solicitud_material.id_producto')
                ->select(
                    'solicitud.id',
                    'producto.id AS id-De-producto',
                    'solicitud.nombre_producto',
                    'solicitud.cantidad',
                    'solicitud.unidad',
                    'solicitud_material.fecha_vencimiento',
                    'solicitud_material.id_producto',
                    'empleado.nombre',
                    'empleado.apellido',
                    'solicitud_material.lote',
                    'area.nombre_area',
                    'producto.saldo AS cantidad_producto',
                    'producto.egresos'
                )->where('solicitud.validacion', '=', 'ACEPTADO')
                ->get()->toArray();

            return $solicitud_material;
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


    public function solicitudes_compras_aceptadas()
    {
        try {
            $solicitud = Solicitud::query()
                ->join('solicitud_compra', 'solicitud_compra.id_solicitud', '=', 'solicitud.id')
                ->join('solicitud_empleado', 'solicitud_empleado.id_solicitud', '=', 'solicitud.id')
                ->join('empleado', 'empleado.rut_empleado', '=', 'solicitud_empleado.rut_empleado')
                ->join('area', 'area.id_area', '=', 'solicitud.area')
                ->join('proveedor', 'proveedor.rut', '=', 'solicitud_compra.rut_proveedor')
                ->select(
                    'solicitud.id',
                    'solicitud.nombre_producto',
                    'solicitud.cantidad',
                    'solicitud.unidad',
                    'solicitud_compra.especificaciones',
                    'solicitud_compra.estado',
                    'solicitud.fecha_solicitud',
                    'area.nombre_area',
                    'empleado.nombre',
                    'empleado.apellido',
                    'proveedor.nombre_empresa'
                )->where('solicitud.validacion', '=', 'ACEPTADO')
                ->get()->toArray();

            return $solicitud;
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

    public function solicitudes_compras()
    {
        try {
            $solicitud = Solicitud::query()
                ->join('solicitud_compra', 'solicitud_compra.id_solicitud', '=', 'solicitud.id')
                ->join('solicitud_empleado', 'solicitud_empleado.id_solicitud', '=', 'solicitud.id')
                ->join('empleado', 'empleado.rut_empleado', '=', 'solicitud_empleado.rut_empleado')
                ->join('area', 'area.id_area', '=', 'solicitud.area')
                ->join('proveedor', 'proveedor.rut', '=', 'solicitud_compra.rut_proveedor')
                ->select(
                    'solicitud.id',
                    'solicitud.nombre_producto',
                    'solicitud.cantidad',
                    'solicitud.unidad',
                    'solicitud.fecha_solicitud',
                    'solicitud_compra.especificaciones',
                    'solicitud_compra.estado',
                    'area.nombre_area',
                    'empleado.nombre',
                    'empleado.apellido',
                    'proveedor.nombre_empresa',
                    'solicitud.validacion'
                )->where('solicitud.validacion', '=', 'ENVIADO')
                ->get()->toArray();

            return $solicitud;
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


    public function ingresar_solicitud_compra(Request $request)
    {
        try {
            $solicitud = new Solicitud();

            $solicitud->nombre_producto = $request->nombre;
            $solicitud->area = $request->area;
            $solicitud->unidad = $request->unidad;
            $solicitud->cantidad = $request->cantidad;
            $solicitud->procedimiento = 'PG-3F-7(6° versión)';
            $solicitud->validacion = 'ENVIADO';
            $solicitud->fecha_solicitud = Carbon::now()->format('d-m-Y');

            $solicitud->save();

            $solicitud_empleado = new Solicitud_empleado();

            $solicitud_empleado->id_solicitud = $solicitud->id;
            $solicitud_empleado->rut_empleado = $request->rut_usuario;

            $solicitud_empleado->save();

            $solicitud_compra = new Solicitud_compra();
            $solicitud_compra->especificaciones = $request->especificaciones;
            $solicitud_compra->estado = $request->estado;
            $solicitud_compra->id_solicitud = $solicitud->id;
            $solicitud_compra->rut_proveedor = $request->proveedor;

            $solicitud_compra->save();

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

    public function ingresar_solicitud_material(Request $request)
    {
        try {
            $solicitud = new Solicitud();

            $solicitud->nombre_producto = $request->nombre;
            $solicitud->area = $request->area;
            $solicitud->unidad = $request->unidad;
            $solicitud->cantidad = $request->cantidad;
            $solicitud->procedimiento = 'PG-3F-1(7° versión)';
            $solicitud->validacion = 'ENVIADO';
            $solicitud->fecha_solicitud = Carbon::now()->format('d-m-Y');
            $solicitud->save();

            $solicitud_empleado = new Solicitud_empleado();

            $solicitud_empleado->id_solicitud = $solicitud->id;
            $solicitud_empleado->rut_empleado = $request->rut_usuario;

            $solicitud_empleado->save();

            $solicitud_material = new Solicitud_material();
            $solicitud_material->lote = $request->lote;
            $solicitud_material->fecha_vencimiento = '';
            $solicitud_material->id_solicitud = $solicitud->id;
            $solicitud_material->id_producto = $request->id_material;
            $solicitud_material->save();

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

    public function actualizar_validacion($id_solicitud)
    {
        $solicitud_aceptada = Solicitud::query()
            ->where('solicitud.id', '=', $id_solicitud)
            ->update(['solicitud.validacion' => 'ACEPTADO']);

        return $solicitud_aceptada;
    }

    public function solicitudes_materiales_rechazadas()
    {
        try {
            $solicitud_material = Solicitud::query()
                ->join('solicitud_material', 'solicitud_material.id_solicitud', '=', 'solicitud.id')
                ->join('solicitud_empleado', 'solicitud_empleado.id_solicitud', '=', 'solicitud.id')
                ->join('empleado', 'empleado.rut_empleado', '=', 'solicitud_empleado.rut_empleado')
                ->join('area', 'area.id_area', '=', 'solicitud.area')
                ->select(
                    'solicitud.id',
                    'solicitud.nombre_producto',
                    'solicitud.cantidad',
                    'solicitud.unidad',
                    'solicitud.fecha_solicitud',
                    'empleado.nombre',
                    'empleado.apellido',
                    'area.nombre_area'
                )->where('solicitud.validacion', '=', 'RECHAZADA')
                ->get()->toArray();

            return $solicitud_material;
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


    public function solicitudes_compra_rechazadas()
    {
        try {
            $solicitud = Solicitud::query()
                ->join('solicitud_compra', 'solicitud_compra.id_solicitud', '=', 'solicitud.id')
                ->join('solicitud_empleado', 'solicitud_empleado.id_solicitud', '=', 'solicitud.id')
                ->join('empleado', 'empleado.rut_empleado', '=', 'solicitud_empleado.rut_empleado')
                ->join('area', 'area.id_area', '=', 'solicitud.area')
                ->join('proveedor', 'proveedor.rut', '=', 'solicitud_compra.rut_proveedor')
                ->select(
                    'solicitud.id',
                    'solicitud.nombre_producto',
                    'solicitud.cantidad',
                    'solicitud.unidad',
                    'solicitud.fecha_solicitud',
                    'solicitud_compra.especificaciones',
                    'solicitud_compra.estado',
                    'area.nombre_area',
                    'empleado.nombre',
                    'empleado.apellido',
                    'proveedor.nombre_empresa',
                    'solicitud.validacion'
                )->where('solicitud.validacion', '=', 'RECHAZADA')
                ->get()->toArray();

            return $solicitud;
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

    public function actualizar_solicitud_material(Request $request)
    {
        if ($request != null) {
            Solicitud::query()
                ->where('solicitud.id', '=', $request->id_solicitud)
                ->update(['solicitud.cantidad' => $request->cantidad_solicitada]);

            Solicitud_material::query()
                ->where('solicitud_material.id_solicitud', '=', $request->id_solicitud) 
                ->update([
                    'solicitud_material.lote' => $request->lote,
                    'solicitud_material.fecha_vencimiento' => $request->fecha_vencimiento
                ]);

            return response()->json(['message' => 'Operación exitosa'], 200);
        }
        return null;
    }

    public function validar_solicitud_aceptada(Request $request)
    {
        try {
            if ($request != null) {
                $productoController = app(ProductoController::class);
                $resultado = $productoController->actualizar_ingreso_egreso($request);
                if ($resultado != null) {
                    Solicitud::query()
                        ->where('solicitud.id', '=', $request->id_solicitud)
                        ->update(['solicitud.validacion' => 'ACEPTADO_1']);

                    return $resultado;
                }
                return response()->json(['error' => 'Error'], 500);
            }
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

    public function rechazar_Solicitud($id_solicitud)
    {
        try {
            Solicitud::query()
                ->where('solicitud.id', $id_solicitud)
                ->update(['solicitud.validacion' => 'RECHAZADA']);
            return 'success';
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
    public function aceptar_solicitud($id_solicitud)
    {
        try {
            Solicitud::query()
                ->where('solicitud.id', $id_solicitud)
                ->update(['solicitud.validacion' => 'ACEPTADO_1']);
            return 'success';
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
}
