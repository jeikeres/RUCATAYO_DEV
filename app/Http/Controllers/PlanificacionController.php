<?php namespace App\Http\Controllers;
//use Illuminate\Http\Request;//para usarlo como inyeccion de dependencias

use Request;
use App\Http\Requests\LoginForm;//añadimos nuestro validador
use App\Models\Plan_Tipo_Mantenimiento;
use App\Models\Plan_Grupo_Trabajo;
use App\Models\Plan_Operacion_Mantenimiento;
use App\Models\Proced_Base;
use App\Models\Proced_Actividad;
use App\Models\Registros;


use Carbon\Carbon;




class PlanificacionController extends Controller {


     public function getIndex()
    {  
       
  //  dd(Plan_Operacion_Mantenimiento::all());
     return view('planificacion', array(
            'page_title' => 'AgregarDocentes',
            'grupo_trabajo' => Plan_Grupo_Trabajo::lists('grupo', 'id_grupo'),
            'tipo_mtto' =>   Plan_Tipo_Mantenimiento::lists('tipo_mantenimiento','id_tipo_mantt'),
             'operacion_mtto' =>  Plan_Operacion_Mantenimiento::lists('operacion_mtto','id_operacion_mtto')     
        ));


        return view('planificacion');

    }

      public function postSave(){

      //dd("entra");
      $id_procedimiento = Request::input('id_procedimiento');

      $procedimiento = Proced_Base::find($id_procedimiento);



      $actividades = Proced_Actividad::where('id_procedimiento','=',$id_procedimiento)->get();

       /*$name = Request::input('nombre');
       $apellido = Request::input('apellido');
       $rut = Request::input('rut');
       $nombre_a = Request::input('nombre_a');*/

       $nombre_procedimiento = $procedimiento->procedimiento;
       $codigo_procedimiento = $procedimiento->cod_procedimiento;
       $act = "";

       foreach ($actividades as $actividad) {
            $act = $act.$actividad->name_actividad.'<br>';
       }

       //obtenemos el campo file definido en el formulario
       //$file = $request->file('file');
       $file = \App::make('dompdf.wrapper');

       $fecha = Carbon::now()->format('d-m-y');

       $nombre = $nombre_procedimiento.$fecha.".pdf";

       $file->loadHTML('<h1>Informe de Procedimiento</h1><br>'
                       .$nombre_procedimiento.'<br>'
                       .$codigo_procedimiento.'<br>
                       Actividades : <br>'.$act.'<br>'
                       );

       //obtenemos el nombre del archivo
       //$nombre = $file->getClientOriginalName();

       //indicamos que queremos guardar un nuevo archivo en el disco local
       \Storage::disk('local')->put($nombre,$file->output());

       $registro = new Registros();

       $maximo_id = \DB::table('REGISTROS')->max('id_registro');
       $maximo_id = $maximo_id + 1;
       $registro->id_registro = $maximo_id;
       /*$registro->id_proc_base = \DB::table('PROCED_BASE')
                              ->where('id_procedimiento','=',Request::input('rut'))
                              ->pluck('id_procedimiento');*/
       $registro->id_proc_base = $procedimiento->id_procedimiento;
       $registro->nombre = $nombre;
       $registro->fecha_creacion = Carbon::now()->format('d-m-y');
       $registro->estado = 1;

       //dd($registro);

       $registro->save();

       //return $nombre." guardado";
       return view('layout');

    }

    
  public function getPruebas($id=null)
  {

  if(isset($id))
  {

   $p = Proced_Base::find($id);

   $mtto = \DB::table('PLAN_MTTO')
                ->where('id_plan_mtto', '=',$p->id_plan_mtto)
                ->pluck('id_activo');
   $mtto2 = \DB::table('PLAN_MTTO')
   
                             ->where('id_plan_mtto', '=',$p->id_plan_mtto)
                             ->pluck('descripcion_mtto');

   $mtto3 = \DB::table('PLAN_MTTO')
                             ->where('id_plan_mtto', '=',$p->id_plan_mtto)
                             ->pluck('frecuencia');
   $mtto4 = \DB::table('PLAN_MTTO')
                             ->where('id_plan_mtto', '=',$p->id_plan_mtto)
                             ->pluck('date_last_ejecutado');

   $mtto4 = new Carbon();

   $a = \DB::table('ACTIVOS')
                ->where('id_activo', '=',$mtto)
                ->pluck('n_equipo');

  $procedimiento= \DB::table('PROCED_BASE')
                ->where('id_procedimiento', '=',$id)
                ->first();
                




    return view('planificacion', array(
            'page_title' => 'AgregarDocentes',
            'grupo_trabajo' => Plan_Grupo_Trabajo::lists('grupo', 'id_grupo'),
            'tipo_mtto' =>   Plan_Tipo_Mantenimiento::lists('tipo_mantenimiento','id_tipo_mantt'),
             'operacion_mtto' =>  Plan_Operacion_Mantenimiento::lists('operacion_mtto','id_operacion_mtto'),
             'id_procedimiento' => $id,
             'plan' => $a,
             'descripcion_mtto' => $mtto2,
             'frecuencia' => $mtto3,
             'ultimo' => $mtto4->format('Y-m-d'),
               'seleccionado_tipomtto' => $procedimiento->id_plan_mtto,
                'seleccionado_grupo_trabajo' => $procedimiento->id_grupo_trabajo,
                  'seleccionado_condicion' => $procedimiento->id_estado_proced,
              

        ));


 }
 else
 {
  //  dd(Plan_Operacion_Mantenimiento::all());
     return view('planificacionvacia', array(
            'page_title' => 'AgregarDocentes',
            'grupo_trabajo' => Plan_Grupo_Trabajo::lists('grupo', 'id_grupo'),
            'tipo_mtto' =>   Plan_Tipo_Mantenimiento::lists('tipo_mantenimiento','id_tipo_mantt'),
             'operacion_mtto' =>  Plan_Operacion_Mantenimiento::lists('operacion_mtto','id_operacion_mtto'),
        ));


        //return view('planificacion');
}
    }




    public function postPlanificacion()
    {

      $input=Request::input('mantt_ejec');
       //$date = date_create_from_format('d/m/y', '27/05/1990'); 

      $date = \DateTime::createFromFormat('Y-m-d',$input);
      $fechaformato=$date->format('Y-m-d');
  
   $activos= \DB::table('ACTIVOS')
                ->where('n_equipo', '=',Request::input('cod_equipo'))
                ->get();

  

   $id_activo= \DB::table('ACTIVOS')
                ->where('n_equipo', '=',Request::input('cod_equipo'))
                ->pluck('id_activo');

                   $tipo= \DB::table('ACTIVOS')
                ->where('n_equipo', '=',Request::input('cod_equipo'))
                ->pluck('tipo');

                    $nequipo= \DB::table('ACTIVOS')
                ->where('n_equipo', '=',Request::input('cod_equipo'))
                ->pluck('n_equipo');

            $resultado= \DB::table('PLAN_MTTO')
                ->where('id_activo', '=',$id_activo)
                ->orderBy('correlativo_mtto', 'desc')
                ->first();
          

             $clasificacion= \DB::table('ACTIVOS')
                ->where('n_equipo', '=',Request::input('cod_equipo'))
                ->pluck('clasificacion');

            $correlativo=$resultado->correlativo_mtto+1;    


      
      $datos=array(
     
       'id_mtto' =>(int)Request::input('id_mtto'),
     'desc_mantt' => Request::input('desc_mantt'),
     'tipomantt' =>  (int)Request::input('tipomantt'),
     'id_grupo' =>(int)Request::input('id_grupo'),
     'frecuencia' =>Request::input('frecuencia'),
       'nequipo' =>  $nequipo,
         'tipo' => (int)$tipo,
           'correlativo' =>  $correlativo,
           'fecha' =>  $fechaformato
    );
  




if($clasificacion != 1)
{

    $sql ="begin add_plan_mtto(:v_id_activo, :v_tipo, :v_desc_mantt, :v_tipo_mantt, :v_grupo_trabajo, :v_frecuencia, :v_mantt_ejec, :v_mantt_prog, :v_n_equipo, :v_corr_mtto, :v_oper_mtto); end;";

    $pdo=\DB::connection()->getPdo();
    $stmt = $pdo->prepare($sql);


    $stmt->bindParam(':v_id_activo',$id_activo);
    $stmt->bindParam(':v_tipo', $datos['tipo']);
    $stmt->bindParam(':v_desc_mantt',$datos['desc_mantt']); 
    $stmt->bindParam(':v_tipo_mantt',$datos['tipomantt']);
    $stmt->bindParam(':v_grupo_trabajo',$datos['id_grupo']);
    $stmt->bindParam(':v_frecuencia',$datos['frecuencia']);
 
    $stmt->bindParam(':v_mantt_ejec',$datos['fecha']);
    $stmt->bindParam(':v_mantt_prog',$datos['fecha']);
    $stmt->bindParam(':v_n_equipo', $$datos['nequipo']);
    $stmt->bindParam(':v_corr_mtto', $correlativo);
    $stmt->bindParam(':v_oper_mtto',$datos['id_mtto']);
       


    $stmt->execute();
    
      //dd("pasa");

//obtngo todos los datos del ultimo creado en plan_mtto   
          $resultado2= \DB::table('PLAN_MTTO')
                ->orderBy('ID_PLAN_MTTO', 'desc')
                ->first();

         

    // $sigla=Plan_Grupo_Trabajo::where('ID_GRUPO',Request::input('id_grupo'))->get(['sigla']);
        $sigla= \DB::table('PLAN_GRUPO_TRABAJO')
                ->where('id_grupo', '=',$resultado2->id_grupo)
                ->pluck('sigla');


               // dd($sigla);

            
               // dd($sigla);

   $users = \DB::table('PROCED_BASE')
                ->where('id_grupo_trabajo', '=',$resultado2->id_grupo)
                ->orderBy('seq_doc', 'desc')
                ->first();  
  
 
  //incremento el numero correlativo
  $correlativo=$users->seq_doc+1;
    

      $datos2=array(

     'sigla' => $sigla,
     'correlativo' => $correlativo
    );
    //  dd($datos);


    $sql = "begin add_proced(:v_name_proced, :v_grupo_trabajo, :v_sigla_grupo, :v_next_doc, :v_id_plan_mtto); end;";
    $pdo=\DB::connection()->getPdo();
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':v_name_proced', $datos['desc_mantt']);
    $stmt->bindParam(':v_grupo_trabajo', $datos['id_grupo']);
    $stmt->bindParam(':v_sigla_grupo', $datos2['sigla']);
    $stmt->bindParam(':v_next_doc', $datos2['correlativo']);
    $stmt->bindParam(':v_id_plan_mtto', $resultado2->id_plan_mtto);

    $stmt->execute();

    


  $ultimo   = \DB::table('PROCED_BASE')
                ->orderBy('ID_PROCEDIMIENTO', 'desc')
                ->first();


return redirect()->route('procedimientos.prueba', [$ultimo->id_procedimiento]);




    }
  
                dd($resultado2);

}
   
  public function deleteEliminar()
  {
       
    if(Request::ajax())
    {
          
        $ids = Request::input('ids');



    \DB::table('PROCED_ACTIVIDAD')
              ->where('id_procedimiento', '=',$ids)
              ->delete();

 $id_planificacion= \DB::table('PROCED_BASE')
                ->where('id_procedimiento', '=',$ids)
                ->pluck('id_plan_mtto');

        \DB::table('PROCED_BASE')
              ->where('id_procedimiento', '=',$ids)
              ->delete();   
    
       \DB::table('PLAN_MTTO')
              ->where('id_plan_mtto', '=',$id_planificacion)
              ->delete();

            $message="ELIMINADO CORRECTAMENTE";
            return $message;  
      
    }


}
    






    	





    



}