<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PostwithEvenNumberIdMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //if($request)
        //return $next($request);
        ///dd($request->route('post'));
        $post =  $request->route('post');
        if ($post->id  % 2 == 0) {
            return $next($request);
        }

        return response()->json([
            'message' =>' the post id is an odd number'
        ]);
    }
}
