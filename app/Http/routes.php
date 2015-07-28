<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::post('login','LoginController@acceder2');

Route::get('crear', function()
{
	//voy a la vista login
	$usuario = new \App\User();
	$usuario->name = 'roberto';
	$usuario->email = 'resparza@gitech.cl';
	$usuario->password =  \Hash::make('1234');
	$usuario->save();
   return "usuario creado";
});


Route::get('dashboard', ['middleware' => 'is_admin', function()
{
    return view('layout');
}]);


Route::controller('login', 'Auth\AuthController', [
    'postLogin' => 'auth.doLogin',
    'getLogout' => 'auth.logout'
]);

Route::controller('procedimientos', 'ProcedimientosController', [
	   'getPrueba' => 'procedimientos.prueba',
     'getValidar' => 'procedimientos.estado_validacion',
    'getValidacion' => 'procedimientos.validacion',
     'getControlCambios' => 'procedimientos.control_cambios',
       'postActividad' => 'procedimientos.actividad',
        'postEditActividad' => 'procedimientos.edit_actividad',
        'getDetalle' =>'procedimientos.detalle',
        'putUpdate' => 'procedimientos.update',
         'deleteEliminar' => 'procedimientos.destroy',
         'getVerEditarActividad' => 'procedimientos.vereditar',
         'postVerEditarActividad' => 'procedimientos.vereditarajax',

]);
//    {!! Form::open(['route' => 'procedimientos.actividad','method' => 'POST']) !!}


Route::controller('planificacion', 'PlanificacionController', [
         'postPlanificacion' => 'planificacion.actividad',
         'getPruebas' =>'planificacion.pruebas',
                 'postSave' =>'planificacion.save',

]);




Route::get('pdf', function()
{
   return view('pdf');
});




Route::get('formulario', 'StorageController@index');
Route::post('storage/create', 'StorageController@save');

Route::get('storage/{archivo}', function ($archivo) {

     $public_path = public_path();

     $url = $public_path.'/storage/'.$archivo;
     //verificamos si el archivo existe y lo retornamos
     if (Storage::exists($archivo))
     {
       return response()->download($url);
     }
     //si no se encuentra lanzamos un error 404.
     abort(404);
});
/*
Route::get('mostrar', function()
{
    $pdf = App::make('dompdf.wrapper');
    $aux = "texto desde variable";
    $pdf->loadHTML('<h1> Test </h1><br><p>'.$aux.'</p>');
    $nombre = "subido";
    \Storage::disk('local')->put($nombre,  \File::get($pdf));
    //return $pdf->stream();
    return "subido";
});
*/
Route::get('storage/{archivo}', function ($archivo) {
     $public_path = public_path();
     $url = $public_path.'/storage/'.$archivo;
     //verificamos si el archivo existe y lo retornamos
     if (Storage::exists($archivo))
     {
       return response()->download($url);
     }
     //si no se encuentra lanzamos un error 404.
     abort(404);

});

Route::controller('registros', 'RegistrosController', [
     //'postConsulta' => 'activos.consulta',
     //'postStore' => 'activos.store',
]);
/*
Route::get('historico', function()
{
   return view('historico');
});
*/


Route::get('ajax', [
    'as' => 'pruebajax', 'uses' => 'StorageController@ajax'
]);