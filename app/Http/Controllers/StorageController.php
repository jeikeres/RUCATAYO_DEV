<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use App\Models\Registros;
use Auth;
use DB;
use Carbon\Carbon;

class StorageController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function save(){

        //dd("entra");

       $name = Request::input('nombre');
       $apellido = Request::input('apellido');
       $rut = Request::input('rut');
       $nombre_a = Request::input('nombre_a');

       //obtenemos el campo file definido en el formulario
       //$file = $request->file('file');
       $file = \App::make('dompdf.wrapper');

       $aux = "texto desde variable";

       $nombre = $nombre_a.".pdf";

       $file->loadHTML('<h1>Test</h1><br>'.$name.'<br>'.$apellido.'<br>'.$rut.'<br>');

       //obtenemos el nombre del archivo
       //$nombre = $file->getClientOriginalName();

       //indicamos que queremos guardar un nuevo archivo en el disco local
       \Storage::disk('local')->put($nombre,$file->output());

       $registro = new Registros();

       $maximo_id = \DB::table('REGISTROS')->max('id_registro');
       $maximo_id = $maximo_id + 1;
       $registro->id_registro = $maximo_id;
       $registro->id_proc_base = \DB::table('PROCED_BASE')
                              ->where('id_procedimiento','=',Request::input('rut'))
                              ->pluck('id_procedimiento');
       $registro->nombre = $nombre;
       $registro->fecha_creacion = Carbon::now()->format('d-m-y');
       $registro->estado = 1;

       //dd($registro);

       $registro->save();

       return $nombre." guardado";

    }

    public function ajax()
    {
        //carga carga ajax roberto
        if(Request::ajax())
        {
            $ej = Request::input('ids');
            $Asignaturas= \DB::table('users')
                ->whereIn('color',$ej)
                ->get();
            //no se porque da error usando eloquent
            // $Asignaturas=Asignaturas::where('departamento_id',$ej)->get());


            return response()->json(array(
                'asig' =>  $Asignaturas
            ));
        }
    }

}