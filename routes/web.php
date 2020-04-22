<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['prefix' => \App\Http\Middleware\Locale::getLocale()], function (){
	Route::get('/', function () {
		return view('welcome');
	});

	Auth::routes();

	Route::get('/home', 'HomeController@index')->name('home');
});

Route::get('setlocale/{lang}', function ($lang) {
	$referer = Redirect::back()->getTargetUrl();
	$parse_url = parse_url($referer, PHP_URL_PATH);

	$segments = explode('/', $parse_url);

	if(in_array($segments[1], Config::get('app.locales'))) {
		unset($segments[1]);
	}

	if ($lang != Config::get('app.locale')) {
		array_splice($segments, 1, 0, $lang);
	}

	$url = Request::root().implode("/", $segments);

	if(parse_url($referer, PHP_URL_QUERY)) {
		$url = $url.'?'.parse_url($referer, PHP_URL_QUERY);
	}
	return redirect($url);
})->name('setlocale');

