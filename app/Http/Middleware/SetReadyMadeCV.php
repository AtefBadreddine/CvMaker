<?php

namespace App\Http\Middleware;

use App\Models\CV;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class SetReadyMadeCV
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($uuid = $request->query('model'))
        {
            if(Str::isUuid($uuid))
            {
                $cvModel = CV::where('uuid', '=', $uuid)->first();
                if($cvModel)
                {
                    $data = (object)json_decode($cvModel->cv_data, JSON_UNESCAPED_UNICODE);
                    Session::put('cv', $data);
                    Session::save();
                }
            }
        }
        return $next($request);
    }
}
