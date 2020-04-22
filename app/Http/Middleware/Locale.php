<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class Locale
{

	public static function getLocale() {
		$uri = Request::path();
		$segmentsUri = explode('/', $uri);

		if(!empty($segmentsUri[0]) && in_array($segmentsUri[0], Config::get('app.locales'))) {

			if ($segmentsUri[0] != Config::get('app.locale')) return $segmentsUri[0];
		}

		return NULL;
	}
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $locale = self::getLocale();
		if ($locale) App::setLocale($locale);
		else App::setLocale(Config::get('app.locale'));

		return $next($request);
    }
}
