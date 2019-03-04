<?php

use App\Restaurant;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('restaurants/near', function (Request $request) {
    return Restaurant::closestTo(
            $request->get('latitude'),
            $request->get('longitude')
        )->limit(5)
        ->get();
});
