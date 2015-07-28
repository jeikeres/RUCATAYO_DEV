<?php namespace App\Http\Controllers;
//use Illuminate\Http\Request;//para usarlo como inyeccion de dependencias
use Auth;
use Request;
use DB;
use Carbon\Carbon;
//use App\Http\Requests\LoginForm;//añadimos nuestro validador
//use App\Models\Activos;
use App\Models\Registros;

class RegistrosController extends Controller {

    public function getIndex()
    {
      //$facultades=Facultades::paginate(3);
         //return view('facultades')->with('facultades',$facultades);
     //return view('facultades');
        //$registros = Registros::all();
        $registros = \DB::table('REGISTROS')->orderBy('created_at', 'asc')->get();
        return view('historico')->with('registros',$registros);
    }

      public function postConsulta(){

      }

      public function postStore(){

      }

     /*public function getShow()
    {
     //dd('entra');
    }

  public function getPrueba($id=null)
    {
     //dd($id);
     //return view('facultades');
   }*/

}