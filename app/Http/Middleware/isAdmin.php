<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Entrust;

class isAdmin {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */

       public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}


	public function handle($request, Closure $next)
	{
	         
       if (!$this->auth->check())
        {
            return redirect('login');
        }
       

        return $next($request);

	}



}
