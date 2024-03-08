<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Muestra;
use App\Models\Empleado_Muestra;
use App\Models\Empresa;
use App\Models\Solicitante;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function Analisis(){
        $muestras = muestra::query()
            ->join("empleado",'Muestra.rut_empleado','empleado.rut_empleado')
            ->where("muestra.estado","Recepcionado")
            ->select("muestra.*")->get()->toArray();
        return $muestras;
    }

    public function Analisis_Recepcionado(){
        $muestras = empleado_muestra::query()
        ->join("empleado",'empleado_muestra.rut_empleado','empleado.rut_empleado')
        ->select("empleado.nombre", 
        DB::raw('COUNT(CASE WHEN empleado_muestra.estado = "Sin iniciar" THEN 1 END) as muestras_pendientes'),
        DB::raw('COUNT(CASE WHEN empleado_muestra.estado = "Entregado" THEN 1 END) as muestras_entregadas'))
        ->groupBy('empleado.nombre')
        ->get()->toArray();
        dd($muestras);

        return $muestras;
    }

    public function cantidad_analisis_realizados_anual(Request $request){

        $year_now = 2023;
        $last_year = 2024;
        $two_years_ago = 2025;

        $mes = now()->month;
        $mes = 9;
        $muestras = Empleado_Muestra::query()
        ->join("empleado", 'empleado_muestra.rut_empleado', 'empleado.rut_empleado')
        ->select(
            DB::raw("CAST(SUM(CASE WHEN empleado_muestra.estado = 'Sin iniciar' AND YEAR(empleado_muestra.fecha_entrega) = $year_now THEN 1 ELSE 0 END) AS SIGNED) as P$year_now"),
            DB::raw("CAST(SUM(CASE WHEN empleado_muestra.estado = 'Entregado' AND YEAR(empleado_muestra.fecha_entrega) = $year_now THEN 1 ELSE 0 END) AS SIGNED) as R$year_now"),
            DB::raw("CAST(SUM(CASE WHEN empleado_muestra.estado = 'Sin iniciar' AND YEAR(empleado_muestra.fecha_entrega) = $last_year THEN 1 ELSE 0 END) AS SIGNED) as P$last_year"),
            DB::raw("CAST(SUM(CASE WHEN empleado_muestra.estado = 'Entregado' AND YEAR(empleado_muestra.fecha_entrega) = $last_year THEN 1 ELSE 0 END) AS SIGNED) as R$last_year"),
            DB::raw("CAST(SUM(CASE WHEN empleado_muestra.estado = 'Sin iniciar' AND YEAR(empleado_muestra.fecha_entrega) = $two_years_ago THEN 1 ELSE 0 END) AS SIGNED) as P$two_years_ago"),
            DB::raw("CAST(SUM(CASE WHEN empleado_muestra.estado = 'Entregado' AND YEAR(empleado_muestra.fecha_entrega) = $two_years_ago THEN 1 ELSE 0 END) AS SIGNED) as R$two_years_ago")            
        )
        ->get()
        ->toArray();

        usort($muestras, function ($a, $b) {
            return $b['P'.$a] <=> $a['P'.$b];
        });
    

        return $muestras;

    }




    public function cantidad_analisis_no_realizados_mensual(){
        $year = now()->year;
        $muestras = Empleado_Muestra::query()
            ->join("empleado", 'empleado_muestra.rut_empleado', 'empleado.rut_empleado')
            ->whereYear("empleado_muestra.fecha_entrega",$year)
            ->select(
                'empleado.nombre',
                DB::raw('COUNT(CASE WHEN empleado_muestra.estado = "Sin iniciar" THEN 1 END) as muestras_pendientes'),
                DB::raw('COUNT(CASE WHEN empleado_muestra.estado = "Entregado" THEN 1 END) as muestras_entregadas')
            )
            ->groupBy('empleado.nombre')
            ->get();
        
        // Agrupar por nombre de empleado y sumar las muestras pendientes
        $muestras_agrupadas = $muestras->groupBy('nombre')->map(function ($items) {
            return [
                'nombre' => $items->first()['nombre'],
                'muestras_pendientes' => $items->sum('muestras_pendientes'),
                'muestras_entregadas' => $items->sum('muestras_entregadas'),
            ];
        })->values()->toArray();
        
        return $muestras_agrupadas;
        
    }
    //Obtener la cantidad de analisis realizados en cada mes del año actual

    public function cantidad_analisis_realizados_por_mes($filtrado){
        if($filtrado==0){
            $filtrado = now()->year;
        }
        $muestras = Empleado_Muestra::query()
        ->join("empleado", 'empleado_muestra.rut_empleado', 'empleado.rut_empleado')
        ->whereYear('empleado_muestra.fecha_entrega', $filtrado);
    
        for ($mes = 1; $mes <= 12; $mes++) {
            $muestras->addSelect(DB::raw("CAST(SUM(CASE WHEN empleado_muestra.estado = 'Sin iniciar' AND MONTH(empleado_muestra.fecha_entrega) = $mes THEN 1 ELSE 0 END) AS SIGNED) as P$mes"));
            $muestras->addSelect(DB::raw("CAST(SUM(CASE WHEN empleado_muestra.estado = 'Entregado' AND MONTH(empleado_muestra.fecha_entrega) = $mes THEN 1 ELSE 0 END) AS SIGNED) as R$mes"));
        }
    

        $muestras = $muestras->get()->toArray();
    

        return $muestras;
    }






    public function Cantidad_Analisis_Recepcionados(){
        $muestras = Empleado_Muestra::query()
        ->join("empleado",'empleado_muestra.rut_empleado','empleado.rut_empleado')
        ->where('empleado_muestra.estado','Sin iniciar')
        ->select("empleado_muestra.estado","empleado.*")
        ->get()->toArray();

        dd($muestras);

        return $muestras;
    }

    public function Cantidad_Empleado(){
        $empleados = Empleado::query()
        ->where('empleado.rol','!=','Gerente')
        ->select('empleado.rut_empleado',"empleado.*")
        ->count();

        dd($empleados);

        return $empleados;
    }

    public function Cantidad_Solicitantes(){
        $cliente = Solicitante::query()
        ->select("solicitante.nombre","solicitante.*")->get();


        dd($cliente);

        return $cliente;
    }

    public function Cantidad_Empresa(){
        $empresa = Empresa::query()
        ->select("empresa.nombre_empresa","empresa.*")->get();

        dd($empresa);

        return $empresa;
    }

    public function Analisis_Recepcionados_RUM(){
        $muestras = Muestra::query()
        ->join("muestra_observaciones",'muestra.RUM','muestra_observaciones.RUM')
        ->select("mustra.estado","muestra.*")->count();

        dd($muestras);


        return $muestras;


    }

    public function Cantidad_Analisis_Recepcionados_Norma(){

        $muestras = Muestra::query()
        ->join("norma",'muestra.id_norma','norma.id_norma')
        ->select(
        DB::raw('COUNT(CASE WHEN norma.nombre_norma = "DS46" THEN 1 END) as DS46'),
        DB::raw('COUNT(CASE WHEN norma.nombre_norma = "DS90" THEN 1 END) as DS90'),
        DB::raw('COUNT(CASE WHEN norma.nombre_norma = "NCh1333" THEN 1 END) as NCh1333'),
        DB::raw('COUNT(CASE WHEN norma.nombre_norma = "NCh409" THEN 1 END) as NCh409'),)
        ->get()->toArray();

        return $muestras;

    }


    public function Analisis_No_Recepcionados(){

        $muestras = empleado_muestra::query()
            ->join("empleado",'empleado_muestra.rut_empleado','empleado.rut_empleado')
            ->where('empleado_muestra.estado','!=','Entregado')
            ->where('empleado.rol','=','Químico')
            ->orWhere('empleado.rol','=','Analista Químico')
            ->select("empleado_muestra.estado","empleado.*")
            ->get();
            //->count();


        dd($muestras);

        return $muestras;
    }

    public function Cantidad_Analisis_No_Recepcionados(){

        $muestras = empleado_muestra::query()
            ->join("empleado",'empleado_muestra.rut_empleado','empleado.rut_empleado')
            ->where('empleado_muestra.estado','!=','Entregado')
            ->where('empleado.rol','=','Químico')
            ->orWhere('empleado.rol','=','Analista Químico')
            ->select("empleado_muestra.estado","empleado.*")
            //->get();
            ->count();


        dd($muestras);

        return $muestras;
    }

    public function obtener_empleados($RUM){

            $empleado = Empleado_Muestra::query()
            ->join("empleado",'empleado_muestra.rut_empleado','empleado.rut_empleado')
            ->join("parametro",'empleado_muestra.id_parametro','parametro.id_parametro')
            ->where("empleado_muestra.RUM",$RUM)
            ->select("empleado_muestra.*","empleado.nombre",'parametro.nombre_parametro')->get()->toArray();
            return $empleado;
    }

    public function obtener_muestras(){
        $muestras = Muestra::query()
        ->select('Muestra.RUM')
        ->groupBy('Muestra.RUM')
        ->get()
        ->toArray();
        

        return $muestras;
    }


    public function muestras($rut){

        $empleado = Empleado::query()
        ->where("empleado.rut_empleado",$rut)
        ->get()->toArray();

        if($empleado[0]['rol'] == 'Supervisor(a)' || $empleado[0]['rol'] == 'Jefe(a) de Laboratorio' || $empleado[0]['rol'] == 'Gerente'){
            $muestras = Muestra::query()
            ->join('empleado','empleado.rut_empleado','muestra.rut_empleado')
            ->join('norma','muestra.id_norma','norma.id_norma')
            ->join('matriz','muestra.id_matriz','matriz.id_matriz')
            ->select('muestra.RUM','muestra.rut_empresa','muestra.nombre_empresa', 'muestra.muestreado_por',
            DB::raw("CONCAT(empleado.nombre, ' ', empleado.apellido) AS nombre_completo"),
            'muestra.cantidad_muestras','muestra.prioridad', 'empleado.rol',
            DB::raw("CONCAT(muestra.fecha_muestreo, ' ', muestra.hora_muestreo) AS fecha_completa"),
            'norma.nombre_norma','matriz.nombre_matriz','muestra.estado')
            ->get()->toArray();
    
            return $muestras;
        }
        else{
            $muestras = Muestra::query()
            ->join('empleado','empleado.rut_empleado','muestra.rut_empleado')
            ->join('norma','muestra.id_norma','norma.id_norma')
            ->join('matriz','muestra.id_matriz','matriz.id_matriz')
            ->where('muestra.rut_empleado',$rut)
            ->select('muestra.RUM','muestra.rut_empresa','muestra.nombre_empresa', 'muestra.muestreado_por',
            DB::raw("CONCAT(empleado.nombre, ' ', empleado.apellido) AS nombre_completo"),
            'muestra.cantidad_muestras','muestra.prioridad', 'empleado.rol',
            DB::raw("CONCAT(muestra.fecha_muestreo, ' ', muestra.hora_muestreo) AS fecha_completa"),
            'norma.nombre_norma','matriz.nombre_matriz','muestra.estado')
            ->get()->toArray();
    
            return $muestras;
        }
    }


    public function muestras_por_mes($mes){
        $muestras = Muestra::query()
        ->join("empleado","empleado.rut_empleado",'muestra.rut_empleado')
        ->whereMonth("muestra.fecha_muestreo",$mes)
        ->select("muestra.RUM",
        DB::raw("CONCAT(empleado.nombre, ' ', empleado.apellido) AS nombre_completo"),
        "muestra.estado","muestra.prioridad",
        DB::raw("CONCAT(muestra.fecha_muestreo, ' ', muestra.hora_muestreo) AS fecha"))
        ->get()
        ->toArray();

        return $muestras;
    }

    public function muestras_por_finalizar(){

        $cantidadMuestras = Muestra::query()
            ->whereYear("muestra.fecha_entrega",now()->year)
            ->where(function ($query) {
                // Obtener la fecha y hora actual
                $now = Carbon::now();

                // Calcular la fecha límite (5 días en el futuro)
                $limiteFechaEntrega = $now->copy()->subDays(5);

                // Aplicar el filtro
                $query->where(function ($subquery) use ($now, $limiteFechaEntrega) {
                    // Considerar también la hora actual si la fecha es igual a la fecha límite
                    $subquery->where('muestra.fecha_entrega', '>', $limiteFechaEntrega->toDateString())
                            ->orWhere(function ($horaSubquery) use ($now, $limiteFechaEntrega) {
                                $horaSubquery->where('muestra.fecha_entrega', '=', $limiteFechaEntrega->toDateString())
                                            ->where('muestra.hora_ingreso', '>=', $now->toTimeString());
                            });
                });
            })
        ->count();

        return $cantidadMuestras;

    }

    public function analisis_pendientes(){
        $cantidadMuestras = empleado_muestra::query()
        ->join("empleado",'empleado_muestra.rut_empleado','empleado.rut_empleado')
        ->where('empleado_muestra.estado','!=','Entregado')
        ->where('empleado.rol','=','Químico')
        ->orWhere('empleado.rol','=','Analista Químico')
        ->count();


        return $cantidadMuestras;

    }

    public function muestras_atrasadas(){

        $now = Carbon::now();

        // 27-11-2023

        $muestras = Muestra::query()
        ->join("empleado_muestra",'empleado_muestra.RUM','muestra.RUM')
        ->where("empleado_muestra.estado",'Sin iniciar')
        ->whereYear("muestra.fecha_entrega",now()->year)
        ->where('muestra.fecha_entrega', '<', $now->toDateString())
        ->distinct("empleado_muestra.RUM")
        ->count();


        return $muestras;
    }


    public function muestras_atrasadas_listado(){
        $now = Carbon::now();


        $muestras = Muestra::query()
        ->join("empleado_muestra", 'empleado_muestra.RUM', 'muestra.RUM')
        ->join("empleado",'muestra.rut_empleado','empleado.rut_empleado')
        ->where("empleado_muestra.estado", 'Sin iniciar')
        ->whereYear("muestra.fecha_entrega", now()->year)
        ->where('muestra.fecha_entrega', '<', $now->toDateString())
        ->select("empleado_muestra.RUM", "Empleado_muestra.rut_empleado",
        DB::raw("CONCAT(empleado.nombre, ' ', empleado.apellido) AS nombre_completo")
        , 'muestra.fecha_entrega')
        ->get()
        ->toArray();
    
        $muestrasConParametros = [];
        
        foreach ($muestras as $muestra) {
            // Verificar si el RUM ya existe en el nuevo array
            $existente = array_filter($muestrasConParametros, function ($element) use ($muestra) {
                return $element['RUM'] == $muestra['RUM'];
            });
        
            if (empty($existente)) {
                // Si no existe, agregar la muestra completa al nuevo array
                $muestrasConParametros[] = $muestra;
            }
        }

        return $muestrasConParametros;
        
        // $muestrasConParametros ahora contiene todas las muestras únicas junto con sus parámetros asociados
        
    }

    public function analisis_finalizados(){
        $cantidadMuestras = Muestra::query()
        ->join("empleado_muestra",'empleado_muestra.RUM','muestra.RUM')
        ->where("empleado_muestra.estado",'Entregado')
        ->whereYear("muestra.fecha_entrega",now()->year)
        ->count();


        return $cantidadMuestras;
    }

    public function analisis_pendientes_anual(){
        $cantidadMuestras = Muestra::query()
        ->join("empleado_muestra",'empleado_muestra.RUM','muestra.RUM')
        ->where('empleado_muestra.estado','Sin iniciar')
        ->whereYear("muestra.fecha_entrega",now()->year)
        ->count();


        return $cantidadMuestras;

    }
}
