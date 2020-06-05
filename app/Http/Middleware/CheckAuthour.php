<?php

namespace App\Http\Middleware;

use Closure;

class CheckAuthour
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
        $index = 30;
        $url = $request->url();
        $article_id = "";


        while(strlen($request->url()) > $index && $url[$index] != '/') {
            $article_id .= $url[$index];
            $index++;
        }

        if(auth()->check() && $request->user()->isAuthour($article_id)) {
            return $next($request);
        }

        return redirect('login');

    }
}
