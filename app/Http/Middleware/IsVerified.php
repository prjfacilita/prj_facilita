<?php
//
//
//namespace App\Http\Middleware;
//
//
//use Closure;
//
//use  Illuminate\Support\Facades\Session;
//
//
//class IsVerified
//{
//    /**
//     * Handle an incoming request.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  \Closure  $next
//     * @return mixed
//     */
//    public function handle($request, Closure $next)
//    {
//        if(!auth()->user()->status){
////            Session::flush();
////            return redirect('login')->withAlert('Please verify your email before login.');
//            return redirect('home')->with('status', 'Please verify your email before login!');
//        }
//        return $next($request);
//    }
//}