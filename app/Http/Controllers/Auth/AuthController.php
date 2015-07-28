<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Request;
use Auth;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);
	}
     

     public function getIndex()
    {  //dd("entra");
    	//return view('login');

    
    	return view('login');
       // return view('auth.login');
    }


    public function postLogin()
    {
      
      
           $datos = array(
                        'name'=>Request::input('nombre'),
                        'password'=>Request::input('contrasena')
                   );
        //para usar auth la contraeña tiene que estar hasheada
          if(Auth::attempt($datos))//comprueba si existe ese user y password en la bd
          {        
                        
              // $user = Auth::user();
       
                  //los errores se mandan internamente no como en l4
                   return redirect()->intended('dashboard');
                
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
    public function getLogout()
    {
        $this->auth->logout();
        return redirect('login')
            ->with('message', 'Ha salido correctamente');
    }
}
