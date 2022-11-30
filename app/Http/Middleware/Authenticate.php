<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            // checa se o prefixo do request começa com "admin".
            // o ltrim é por causa de um bug caso a url fosse só "url/admin" o prefixo seria "/admin" e não "admin"
            if (str_starts_with(ltrim($request->route()->getPrefix(), "/"), 'admin')) 
                return route('admin.login');
            else
                return route('login');
        }
    }
}
