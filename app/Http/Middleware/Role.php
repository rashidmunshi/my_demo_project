<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Role
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
        if (Auth::check()) {
            //admin role == 0
            //vendor == 1
            if (Auth::user()->role == 0) {
                return $next($request);
            } else {
                return redirect()->route('home')->with('message', 'access denied');
            }
        } else {
            return redirect()->route('login');
        }
    }
}



// $user = Auth::user();

// if($user->status =='0'){
//     $model= User::where('id',$user->id)->whereMonth('month',Carbon::now()->month)->get()
// }
