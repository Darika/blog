<?php
/**
 * check user online
 */
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class IsUserOnline
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
    	if (Auth::check()) {
    		$user = Auth::user();
    		$expires_at = Carbon::now()->addMinutes(5);
    		Cache::put('user-is-online-'.$user->id, TRUE, $expires_at);
		}
        return $next($request);
    }
}
