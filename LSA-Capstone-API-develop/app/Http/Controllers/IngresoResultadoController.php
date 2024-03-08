<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Empleado_formulario_muestra;
use App\Models\Form;
use App\Models\Field;
use App\Models\field_form;
use App\Models\Tecnicas;
use App\Models\Muestra;
use App\Models\User;
use Error;
use Exception;
use Illuminate\Database\QueryException;

class IngresoResultadoController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id,$rut_empleado)
    {

        //Mediante $request->input puede acceder a cada uno de los campos de un objeto
        //CREO LA TABLA FIELD
        try{

        $data = $request->all();

        $largo = count($data) - 1;

        $arrayCampos = array_keys($data);


        // Luego de obtener el array  debo encontrer la muestra con el Rum (id) obtenido

        $muestra = Muestra::find($id);

        $empleado = Empleado::find($rut_empleado);

        // Despues debo crear el formulario nuevo.

        $formulario= new Form();

        $formulario->Nombre = '';

        $formulario->tecnica_id = $request->input($arrayCampos[$largo]);
        $formulario->save();

        $empleado_formulario_muestra = new Empleado_formulario_muestra();

        $empleado_formulario_muestra->form_id = $formulario->id;

        $empleado_formulario_muestra->RUM_muestra = $muestra->RUM;

        $empleado_formulario_muestra->rut_empleado = $rut_empleado;


        $empleado_formulario_muestra->save();

        $indice = 0;

        $respuesta = '';

        $array = array();
        //Ahora debo comprobar si ya existen los campos

        while($largo>0){
            $campo = Field::where('Nombre',$arrayCampos[$indice])->first();

            if($campo){
                $id_campo = $campo->id;
                array_push($array, $id_campo);
            }
            else{
                $campo = new Field();
                $campo->Nombre = $arrayCampos[$indice];
                $campo->Tipo = 'Texto';

                $campo->save();
                $id_campo = $campo->id;
            }
            $campos_formulario = new field_form();
            $campos_formulario->form_id = $formulario->id;
            $campos_formulario->field_id = $id_campo;
            $campos_formulario->Valor = $request->input($arrayCampos[$indice]);

            $campos_formulario->save();
            $indice++;
            $largo--;
        }
        return 'Todo Okey';

    } catch (QueryException $e) {
        // Captura cualquier excepción relacionada con la consulta a la base de datos
        // Muestra o registra el mensaje de error
        return $e->getMessage();
    } catch (\Exception $e) {
        // Captura otras excepciones generales
        // Muestra o registra el mensaje de error
        return $e->getMessage();
    }


        

        /*try {
            while($largo>0){
                $campos_formulario = new field_form();
                $campo = new Field();
    
                $campo->Nombre = $arrayCampos[$indice];
                $campo->Tipo = 'Texto';
    
    
                $campo->save();
                
                $campos_formulario->form_id = 5;
                $campos_formulario->field_id = $campo->id;
                $campos_formulario->Valor = $request->input($arrayCampos[$indice]);
    
                $campos_formulario->save();
    
                $indice++;
                $largo--;
                
            }
            return $largo;
        } catch (Exception $e) {
            return $e;
        }
        */




        // CREO LA TABLA FIELD_FORM

        
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function buscar_formulario($id,$rut_empleado){


        $empleado = Empleado::query()
        ->where("empleado.rut_empleado",$rut_empleado)
        ->get()->toArray();

        // Si el rut pertenece a la jefa o supervisora
        if($empleado[0]['rol'] == "Jefe(a) de Laboratorio" || $empleado[0]['rol'] == "Supervisor(a)" ){


            try{
                $formularios = Empleado_formulario_muestra::query()
                ->join("forms",'forms.id','empleado_formulario_muestra.form_id')
                ->where('RUM_muestra',$id)
                ->select('forms.tecnica_id','empleado_formulario_muestra.rut_empleado','empleado_formulario_muestra.form_id','empleado_formulario_muestra.RUM_muestra')
                ->groupBy('forms.tecnica_id','empleado_formulario_muestra.rut_empleado','empleado_formulario_muestra.form_id','empleado_formulario_muestra.RUM_muestra')
                ->get()
                ->toArray();
    
    
            }catch (QueryException $e) {
                // Captura cualquier excepción relacionada con la consulta a la base de datos
                // Muestra o registra el mensaje de error
                return $e->getMessage();
            } catch (\Exception $e) {
                // Captura otras excepciones generales
                // Muestra o registra el mensaje de error
                return $e->getMessage();
            }

            if($formularios){
                return $formularios;
            }
            else{
                return 'no existe';
            }
        }

        else{


            try{
                $formularios = Empleado_formulario_muestra::query()
                ->join("forms",'forms.id','empleado_formulario_muestra.form_id')
                ->where('RUM_muestra',$id)
                ->where('rut_empleado',$rut_empleado)
                ->select('forms.tecnica_id','empleado_formulario_muestra.rut_empleado','empleado_formulario_muestra.form_id','empleado_formulario_muestra.RUM_muestra')
                ->groupBy('forms.tecnica_id','empleado_formulario_muestra.rut_empleado','empleado_formulario_muestra.form_id','empleado_formulario_muestra.RUM_muestra')
                ->get()
                ->toArray();
            }catch (QueryException $e) {
                // Captura cualquier excepción relacionada con la consulta a la base de datos
                // Muestra o registra el mensaje de error
                return $e->getMessage();
            } catch (\Exception $e) {
                // Captura otras excepciones generales
                // Muestra o registra el mensaje de error
                return $e->getMessage();
            }
          

            if($formularios){
                
                // Existe un formulario
                return $formularios;
            }
            else{
                return 'no existe';
            }
        }
    }
    

    //Mostrar el formulario asociado
    public function actualizar_formulario($id){

       
        
        $formulario = Form::find($id);
        $tecnica = Tecnicas::find($formulario->tecnica_id);
        try {
            $valores = $formulario->fields_forms()->get();

            $array = ['tecnica' => $tecnica->Tecnica];
            $valores->push($array);

            
            return $valores;
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

    // Modifica el formulario asociado

    public function modificar_formulario(Request $request, $id){

        $data = $request->all();

        $largo = count($data) - 1;
        $indice = 0;

        $arrayCampos = array_keys($data);

        //Encuentro el formulario asociado.

        $formulario = Form::find($id);


        $id_formulario = $formulario->id;


        while($largo>0){
            $campo = Field::where('Nombre',$arrayCampos[$indice])->first();

            if($campo){
                $id_campo = $campo->id;

                $campos_formulario = field_form::where('form_id',$id_formulario)->where('field_id',$id_campo)->first();

                $campos_formulario->valor = $request->input($arrayCampos[$indice]);

                $campos_formulario->save();

            }
            $indice++;
            $largo--;
        }



        return 'Finalizado con exito';

    }
    public function infoEmpleado($id){
        $empleado = User::query()
        ->where('users.id', '=', $id)
        ->select('users.nombre', 'users.apellido', 'users.email')
        ->get()->toArray(); 

        $nombre = $empleado[0]['nombre'];

        $apellido = $empleado[0]['apellido'];

        $email = $empleado[0]['email'];

        $new_empleado = Empleado::query()
        ->where('empleado.nombre', $nombre)
        ->where('empleado.apellido', $apellido)
        ->where('empleado.correo', $email)
        ->select('empleado.rut_empleado')
        ->get()->toArray();

        return $new_empleado[0]['rut_empleado'];
    }
}
