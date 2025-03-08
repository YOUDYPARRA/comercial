<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Authenticate
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->guest()) {
            if ($request->wantsJson() || $request->ajax()) {
                return response('No autorizado.', 401);
            } else {
                return redirect()->guest('auth/login');
            }
    }else{
//        echo $request->path();
//            echo $request->get('vi');
//            echo $request->get('vista');
//        echo \Route::current()->getName();
    }
        return $next($request);
    }
}
