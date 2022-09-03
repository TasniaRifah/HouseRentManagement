<?php

namespace App\Http\Middleware;
use App\Models\user;
use Auth;


use Closure;
use Illuminate\Http\Request;

class MyDashboaedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
  {
    if(!Auth::check() && !Auth::user()->id == Auth::login($user))
    {
      dd("you are not allowed to see this");
    }

    return $next($request);
  }

}
