<?php

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

Route::view('/', 'welcome');

Route::get('restaurants', function () {
    return view('restaurants.index', [
        'restaurants' => App\Restaurant::all(),
    ]);
});

Route::get('service-areas.geojson', function () {
    $features = \App\ServiceRegion::selectRaw('name, ST_AsGeoJson(shape) as geojson')->get()->map(function ($serviceRegion) {
        return [
            'type' => 'Feature',
            'geometry' => json_decode($serviceRegion->geojson),
            'properties' => [
                'name' => $serviceRegion->name,
            ],
        ];
    });

    return response()->json([
        'type' => 'FeatureCollection',
        'features' => $features,
    ]);
});
