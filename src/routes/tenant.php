<?php

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use Stancl\Tenancy\Middleware\ScopeSessions;

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
Route::middleware([
	'web',
	'changeConfigVars',
	'logs-out-banned-user',
	InitializeTenancyByDomain::class,
	PreventAccessFromCentralDomains::class,
	ScopeSessions::class
])->group(function ()
{
	Route::group(['namespace' => 'App\Http\Controllers\MaystroDelivery'], function ()
	{
		Route::post('maystro/webhook/endpoint', 'MaystroDeliveryController@endpoint');
	});
});