<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;
use Config;


class Permission_Staff
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ( Auth::check() ) {
            // check permisition STAFF
            $arr_power = permistion(Auth::user()->u_power);
            if ( !in_array('SUPPER_ADMIN', $arr_power) || !in_array('ADMIN', $arr_power) ) {
                if ( !in_array('STAFF', $arr_power) ) {
                    Session::flash('no_access', $configs = Config::get('constants.DEFINE')['MESSAGE_NO_ACCESS']);
                    return redirect()->route('backend.menu');
                }
            }
        }

        return $next($request);
    }
}
