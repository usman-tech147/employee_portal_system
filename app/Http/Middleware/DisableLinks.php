<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class DisableLinks
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
//        dd('disable link');
        $user = User::find(Auth::user()->id);
        if($user->status == 1){
            return redirect()->back();
        }
        return $next($request);
    }
}
