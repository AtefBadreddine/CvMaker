<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
      	if($request->is('api/*'))
        {
          if(!Cache::has('fileName')) {Cache::put('fileName', uniqid(), 10);}
          if(Cache::has('selectedLang')){
              App::setlocale(Cache::get('selectedLang'));
          }
          App::setlocale($request->header('Accept-Language'));
        }
      	else{
          if(!$request->session()->has('fileName')) {$request->session()->put('fileName', uniqid()); $request->session()->save();}
          if($request->session()->has('selectedLang') || $request->query('lang')){
              App::setlocale($request->query('lang') ?? $request->session()->get('selectedLang'));
              $request->session()->put("selectedLang", $request->query('lang') ?? $request->session()->get('selectedLang'));
              $request->session()->save();
              // dd(session()->all());
          }
        }
        return $next($request);
    }
}
