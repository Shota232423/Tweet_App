<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class UserMiddleware
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
        $user_name =  $request->name;
        $user_info = User::where('name',$user_name)->first();
        ///存在しないユーザがパラメータに指定された場合は、home画面にリダイレクト
        if(empty($user_info)){
            return redirect()->route('home');
        }
        return $next($request);
    }
}