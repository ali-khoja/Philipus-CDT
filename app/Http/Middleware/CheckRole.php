<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$allowedRoles)
    {
        if (auth()->check()) {
            $user = auth()->user();
            
            if ($user->is_admin) {
                return $next($request);
            } else {
                $allowedRoles = ['dashboard' , 'gallery' ,  'post' , 'post.index' , 'post.update' , 'post.store', 'post.destroy' , 'gallery.index' , 'gallery.update' , 'gallery.store', 'gallery.destroy'];
                $routeName = $request->route()->getName();
                if (in_array($routeName, $allowedRoles)) {
                    return $next($request);
                } else {
                    abort(403, 'Unauthorized action. User does not have permission.');
                }
            }
        }

        abort(403, 'Unauthorized action.');
    }
}

