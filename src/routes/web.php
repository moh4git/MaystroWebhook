<?php

use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;

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
Route::withoutMiddleware([VerifyCsrfToken::class])->group(function ()
{
	Route::group(['namespace' => 'App\Http\Controllers\MaystroDelivery'], function ()
	{
		Route::post('maystro/webhook/endpoint', 'MaystroDeliveryController@endpoint');
	});
});
