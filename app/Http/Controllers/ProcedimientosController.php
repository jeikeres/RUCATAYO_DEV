<?php namespace App\Http\Controllers;
//use Illuminate\Http\Request;//para usarlo como inyeccion de dependencias

use Request;
use App\Http\Requests\LoginForm;//añadimos nuestro validador
use App\Models\Plan_Grupo_Trabajo;
use App\Models\Proced_Base;


class ProcedimientosController extends Controller {


     public function getIndex()
    {  //dd("entra");

   // $plan=Plan_Grupo_Trabajo::where('ID_GRUPO',Request::input('id_grupo'))->get();

/*
      $users = \DB::table('PROCED_BASE')
                ->where('ID_GRUPO_TRABAJO', '=', 1)
                  ->orderBy('seq_doc', 'desc')
                ->get();            
                  dd($users);

  */ 
/*
       $role = Usuario::join('role_user', 'role_user.user_id', '=', 'usuarios.rut')
            ->where('role_user.role_id', '=', '2')
            ->lists('usuarios.name','usuarios.rut');
            */


      $join= \DB::table('proced_base')
            ->join('plan_mtto', 'proced_base.id_plan_mtto', '=', 'plan_mtto.id_plan_mtto')
            ->join('activos', 'plan_mtto.id_activo', '=', 'activos.id_activo')
            ->select('id_procedimiento','n_equipo', 'descripcion_s', 'cod_procedimiento')
            ->get();

          



         return view('procedimientos', array(
            'page_title' => 'AgregarDocentes',
            'join' => $join
                 
        ));
    // dd(Plan_Grupo_Trabajo::find(1));

    	//return view('login');
    //	return view('login');
       // return view('auth.login');
    }



  public function getPrueba($id)
    {
  
      $procedimiento= \DB::table('PROCED_BASE')
                ->where('id_procedimiento', '=',$id)
                ->first();

                $nombre=$procedimiento->procedimiento;
               $select=$procedimiento->id_grupo_trabajo;
                $id_proc=$procedimiento->id_procedimiento;


            $join= \DB::table('proced_base')
            ->join('plan_grupo_trabajo', 'proced_base.id_grupo_trabajo', '=', 'plan_grupo_trabajo.id_grupo')
            ->where('id_grupo_trabajo',$select)
            ->select('grupo')
            ->first();

     

        return view('procedimientos2', array(
          'grupo_trabajo' => \DB::table('PLAN_GRUPO_TRABAJO')->lists('grupo','id_grupo'),
          'proced_base' => $nombre,
          'seleccionado' => $select,
          'id_procedimiento' => $id_proc,
          'grupo' => $join->grupo
        ));


    }


    public function getValidar()
    {
   
  
        $join= \DB::table('proced_base')
            ->join('plan_mtto', 'proced_base.id_plan_mtto', '=', 'plan_mtto.id_plan_mtto')
            ->join('activos', 'plan_mtto.id_activo', '=', 'activos.id_activo')
             ->join('proced_estados', 'proced_estados.id_estado', '=', 'proced_base.id_estado')
            ->select('id_procedimiento','n_equipo', 'descripcion_s', 'cod_procedimiento','nombre')
            ->get();


         return view('estado_validacion', array(
            'join' => $join
                 
        ));
      
    }

   
       public function getValidacion()
    {
   
              $procedimientos= \DB::table('PROCED_BASE')->get();
   return view('validar', array(
            'procedimientos' => $procedimientos
                 
        ));

    }




    public function getControlCambios($id)
    {
     
 
        $procedimiento= \DB::table('REGISTROS')
                ->where('id_proc_base', '=',$id)
                ->get();

           



        return view('historico', array(
       
          'detalle' => $procedimiento
        ));

    

      
    }
    
    

    public function putUpdate($id)
    {
      dd("entra");
    
        $this->docente->update(Request::all(),$id);
       return redirect('docentes')->with('message', 'Post updated');
        
    }




 public function postActividad()
 {

    dd(Request::all());
    /*
$db = \DB::connection();
  //dd($db);  
  //dd(\DB::select('ADD_PROCED',array($email)));
      
  // $sigla=Plan_Grupo_Trabajo::where('ID_GRUPO',Request::input('id_grupo'))->get(['sigla']);
        $sigla= \DB::table('PLAN_GRUPO_TRABAJO')
                ->where('id_grupo', '=',Request::input('id_grupo'))
                ->pluck('sigla');

            
               // dd($sigla);

   $users = \DB::table('PROCED_BASE')
                ->where('id_grupo_trabajo', '=',Request::input('id_grupo'))
                ->orderBy('seq_doc', 'desc')
                ->first();  
  
 
  //incremento el numero correlativo
  $correlativo=$users['seq_doc']+1;
    

      $datos=array(

     'nombre_procedimiento' => Request::input('name_proced'),
     'id_grupo' =>  Request::input('id_grupo'),
     'sigla' => $sigla,
     'correlativo' => $correlativo
    );
    //  dd($datos);


    $sql = "begin add_proced(:v_name_proced, :v_grupo_trabajo, :v_sigla_grupo, :v_next_doc); end;";
    $pdo=\DB::connection()->getPdo();
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':v_name_proced', $datos['nombre_procedimiento']);
    $stmt->bindParam(':v_grupo_trabajo', $datos['id_grupo']);
    $stmt->bindParam(':v_sigla_grupo', $datos['sigla']);
    $stmt->bindParam(':v_next_doc', $datos['correlativo']);
    $stmt->execute();
    
      dd($datos);
      */


}



public function getDetalle($id)
{

dd($id);

}


public function postEditActividad()
{

 if(Request::ajax())
  {  

        $contador= \DB::table('proced_actividad')
            ->join('proced_base', 'proced_actividad.id_procedimiento', '=', 'proced_base.id_procedimiento')
            ->where('proced_actividad.id_procedimiento','=',Request::input('id_procedimiento'))
            ->count();

    $contador=$contador+1;
   

    $datos=array(

     'id_proc' => (int)Request::input('id_procedimiento'),
     'item' =>  $contador,
     'actividad' => Request::input('actividad'),
     'detalle' => Request::input('detalle')
  
    );
    

         // $ej=Request::input('name_proced');

    $sql = "begin add_actividad(:v_name_actividad, :v_item, :v_id_procedimiento, :v_detalle); end;";
    $pdo=\DB::connection()->getPdo();
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':v_name_actividad',$datos['actividad']);
    $stmt->bindParam(':v_item',$datos['item']);
    $stmt->bindParam(':v_id_procedimiento',$datos['id_proc']);
    $stmt->bindParam(':v_detalle',$datos['detalle']);
    $stmt->execute();

  $ultimo= \DB::table('PROCED_ACTIVIDAD')
                ->orderBy('ID_ACTIVIDAD', 'desc')
                ->first();


//añade una nueva clave valor al arreglo asociativo
$datos['id']=$ultimo->id_actividad;





   // $last=\DB::connection()->getPdo()->lastInsertId();

/*
                  $Asignaturas= \DB::table('salas')
              ->where('campus_id',$ej)
              ->get();
             //no se porque da error usando eloquent
            // $Asignaturas=Asignaturas::where('departamento_id',$ej)->get());
           */
            
          return response()->json(($datos));
      } 


}


  public function deleteEliminar()
  {
       
    if(Request::ajax())
    {
            $ids = Request::input('ids');


  $ultimo= \DB::table('PROCED_ACTIVIDAD')
                ->where('id_actividad', '=',$ids)
                ->delete();

            $message="ELIMINADO CORRECTAMENTE";
            return $message;  
      
    }


}


 public function getVerEditarActividad($id)
 {

  
    
      $procedimiento= \DB::table('PROCED_BASE')
                ->where('id_procedimiento', '=',$id)
                ->first();

                $nombre=$procedimiento->procedimiento;
               $select=$procedimiento->id_grupo_trabajo;
                $id_proc=$procedimiento->id_procedimiento;
     

     $actividades= \DB::table('proced_base')
                      ->join('proced_actividad', 'proced_base.id_procedimiento', '=', 'proced_actividad.id_procedimiento') 
                      ->where('proced_actividad.id_procedimiento',$id)
                      ->select('id_actividad','name_actividad', 'detalle', 'item')
                       ->orderBy('item', 'asc')
                      ->get();
                   


                          return view('VerEditarActividad', array(
          'grupo_trabajo' => \DB::table('PLAN_GRUPO_TRABAJO')->lists('grupo','id_grupo'),
          'proced_base' => $nombre,
          'seleccionado' => $select,
          'id_procedimiento' => $id_proc,
          'acti' => $actividades
        ));


                       




 }


  public function postVerEditarActividad()
 {
   
     if(Request::ajax())
     {  

          $datos=array(

     'name_actividad' => Request::input('actividad'),
     'detalle' => Request::input('detalle'),

  
    );


 
   \DB::table('proced_actividad')
            ->where('id_actividad',Request::input('id_actividad'))
            ->update($datos);


                
          return response()->json(array(
              'resultado' => $datos
               ));
   } 
    
 }

 public function postVerEditarActividads()
 {
    if(Request::ajax())
     {  

      
     $variable= Request::input('id');
     $id_procedimiento=Request::input('id_procedimiento');


     

     //       $msg = null;
     //   $people=array();

    //    $roles = Sala::find(Request::input('salas'))->periodos;
      //  $ids=Request::input("periodo");


         $actividades= \DB::table('PROCED_ACTIVIDAD')
                ->where('id_procedimiento',$id_procedimiento)
                ->orderBy('item', 'asc')
                ->get();
      
     $i=0;    
     foreach($variable as $val) 
     {
     
         $id = $val; // ordenes

 
              $idactiv=$actividades[$i]->id_actividad; //id actividad 
             $item_Activ_post=$id; //orden 

        
             \DB::table('proced_actividad')
                   ->where('id_actividad',$idactiv)
                    ->update(['item' => $item_Activ_post]);

        $i++;
    }

    
         $actividades2= \DB::table('PROCED_ACTIVIDAD')
                ->where('id_procedimiento',$id_procedimiento)
                ->orderBy('item', 'asc')
                ->get();

       
         $item_new = 1;
          $is=0;
        foreach($variable as $vale) 
           {
                  
                
              $idactiv2=$actividades2[$is]->id_actividad; //id actividad 
          
                \DB::table('proced_actividad')
                   ->where('id_actividad',$idactiv2)
                    ->update(['item' => $item_new]);


                $item_new++;
                $is++;
          }



/*
         $is=0;

   $item_new = 1;
     foreach($variable as $vals) 
     {
     
         $id2 = $vals; // ordenes

      $actividades2= \DB::table('PROCED_ACTIVIDAD')
                ->where('id_procedimiento', '=',$id_procedimiento)
                ->orderBy('item', 'asc')
                ->get();




              $idactivs=$actividades2->id_actividad; //orden 
            //  $item_Activ_posts2=$id2; //id actividad

             
          //   $query_update_first = "UPDATE PROCED_ACTIVIDAD SET ITEM = $item_Activ_post WHERE ID_ACTIVIDAD = $idactiv";
        
     \DB::table('proced_actividad')
            ->where('id_actividad',$idactivs)
            ->update(['item' => $item_new]);


//$query_update_first = "UPDATE PROCED_ACTIVIDAD SET ITEM = $item_new WHERE ID_ACTIVIDAD = $idactiv";
//$query_exe_update = oci_parse($conexion, $query_update_first);
//oci_execute($query_exe_update);

$item_new++; // incremnenta desde el primer item de uno en uno



        $is++;
    }
*/
 

          return response()->json(array(
              'resultado' => $actividades
               ));

   
   } 




 }








}