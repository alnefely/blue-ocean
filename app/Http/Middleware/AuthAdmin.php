<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$rol): Response
    {
        $AuthAdmin = auth('admin');
        if( $AuthAdmin->check() ):
            if ( empty($AuthAdmin->user()->role_id) || $AuthAdmin->user()->role->$rol != 'on') :
                return redirect('/admin/error?url='.$request->url())->with('error', __('trans.auth.alert_not_permission'));
            endif;
            return $next($request);
        endif;
        return redirect('/admin/login');
    }
}
