<?php

namespace App\Http\Middleware;

use App\Models\posts;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PemilikPostingan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $id_author = posts::findOrFail($request->id);
        $user = Auth::user();

        if($id_author->author != $user->id ) {
            return response()->json([
                'message' => 'kamu bukan pemilik postingan'
            ]);
        }
        
        return $next($request);
    }
}
