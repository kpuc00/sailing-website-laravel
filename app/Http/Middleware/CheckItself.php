<?php

namespace App\Http\Middleware;

use Closure;

class CheckItself
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
        $index = 27;

        $url = $request->url();
        $user_id = "";

        while(strlen($url) > $index && $url[$index] != '/' ) {
            $user_id .= $url[$index];
            $index++;
        }


        if(auth()->check() && $request->user()->id == $user_id) {
            return $next($request);
        }

        return redirect('/home');
    }
}
