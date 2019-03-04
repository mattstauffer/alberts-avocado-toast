<?php

use Faker\Generator as Faker;

$factory->define(App\Restaurant::class, function (Faker $faker) {
    return [
        'name' => "Albert's " . $faker->city,
        'latitude' => $faker->randomFloat(8, 29.617588, 29.702352),
        'longitude' => $faker->randomFloat(8, -82.422468, -82.255709),
        'location' => function ($raw) {
            return DB::raw("ST_PointFromText('POINT(" . $raw['longitude'] . " " . $raw['latitude'] . ")', 4326)");
        },
    ];
});
