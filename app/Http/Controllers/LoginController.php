<?php namespace App\Http\Controllers;
//use Illuminate\Http\Request;//para usarlo como inyeccion de dependencias
use Auth;
use Request;
use App\Http\Requests\LoginForm;//añadimos nuestro validador
class LoginController extends Controller {


  public function acceder2(LoginForm $bookForm)
  {
    //recibo el username y password desde el formulario en login

           $datos = array(
          'name'=>Request::input('nombre'),
          'password'=>Request::input('contrasena')
            );
          if(Auth::attempt($datos))//comprueba si existe ese user y password en la bd
          {

               $status = Auth::user()->name;

                if($status == 'roberto')
                {
                  //check if user account is enabled

                   return redirect()->intended('home');
                }
             /*
                if($status == 1)
                { //check if user account is enabled

                   return Redirect::to('gestion');
                }
                elseif($status == 2)
                {
                  return Redirect::to('profesional');
                }
               */


          }
          else
          {
               return redirect('login');

         }



  }


}
