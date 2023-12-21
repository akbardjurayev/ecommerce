<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


use Illuminate\Http\JsonResponse as HttpJsonResponse;

class JsonResponse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // if($response instanceof HttpJsonResponse)
        // {
        //     $data = $response->getData();
        //     $data = collect($data)->toArray();
        //     $data = array_merge(['status' => true], $data);

        //     $response->setData($data);
        // }

        return $response;
    }
}
